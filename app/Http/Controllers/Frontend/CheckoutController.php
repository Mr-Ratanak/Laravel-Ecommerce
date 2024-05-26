<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\placeOrderMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout(){
        $totalCheck = 0;
        $totalProductAmount = Cart::where('user_id',auth()->user()->id)->get();
        foreach($totalProductAmount as $totalAmount){
            $totalCheck += $totalAmount->product_cart->selling_price * $totalAmount->quantity;
        }

        return view('frontend.collection.checkout.checkout-show',compact('totalCheck'));
    }

    public function placeOrder(Request $req){
        $payment_mode = 'Cash on Delivery Mode';
        $tracking_no = NULL;

        $totalPrice = 0;
        $totalProductAmount = Cart::where('user_id',auth()->user()->id)->get();
        foreach($totalProductAmount as $totalAmount){
            $totalPrice += $totalAmount->product_cart->selling_price * $totalAmount->quantity;
        }

        $req->validate([
            'fullname'=>'required|max:255',
            'phone'=>'required|max:12',
            'email'=>'required',
            'pincode'=>'required',
            'address'=>'required',
        ]);

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->tracking_no = $tracking_no;
        $order->fullname = $req->input('fullname');
        $order->phone = $req->input('phone');
        $order->email = $req->input('email');
        $order->pincode = $req->input('pincode');
        $order->address = $req->input('address');
        $order->status_message = "In progress";
        $order->payment_mode = $payment_mode;
        $order->payment_id = null;
        $order->total_price = $totalPrice;

        $order->save();
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        foreach($carts as $cart){
            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$cart->product_id,
                'product_color_id'=>$cart->product_color_id,
                'quantity'=>$cart->quantity,
                'price'=>$cart->product_cart->selling_price,
            ]);
        }
        if($order){
            Cart::where('user_id',auth()->user()->id)->delete();

            // make process send email
            try {
                $order = Order::findOrFail($order->id);
                Mail::to($order->email)->send(new placeOrderMailable($order));
            } catch (\Exception $e) {
                //throw $th;
            }

            return redirect('/thank-to')->with('message','Your order successfully');
        }else{
            return redirect('admin/products')->with('error','Something went wrong!');
        }
    }
    public function thankYou(){
        return view('frontend.collection.checkout.thanks');
    }

    public function placeOrderOnline(Request $req){

        $payment_mode = 'Online Payment Mode';
        $tracking_no = "KH-SALE-" . Str::random(8);
        $randomString = Str::random(8); // Generates a random string of length 8

        // Manipulate the generated string to include uppercase letters and numbers
        $uppercaseLetters = Str::upper($randomString); // Convert the string to uppercase
        $numbers = rand(1000, 9999); // Generate a random 4-digit number

        $finalString = substr($uppercaseLetters, 0, 4) . $numbers . substr($uppercaseLetters, 4); //So the finalString is 12 characters

        $totalPrice = 0;
        $totalProductAmount = Cart::where('user_id',auth()->user()->id)->get();
        foreach($totalProductAmount as $totalAmount){
            $totalPrice += $totalAmount->product_cart->selling_price * $totalAmount->quantity;
        }

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->tracking_no = $tracking_no;
        $order->fullname = $req->input('fullname');
        $order->phone = $req->input('phone');
        $order->email = $req->input('email');
        $order->pincode = $req->input('pincode');
        $order->address = $req->input('address');
        $order->status_message = "In progress";
        $order->payment_mode = $payment_mode;
        $order->payment_id = $finalString;
        $order->total_price = $totalPrice;

        $order->save();
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        foreach($carts as $cart){
            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$cart->product_id,
                'product_color_id'=>$cart->product_color_id,
                'quantity'=>$cart->quantity,
                'price'=>$cart->product_cart->selling_price,
            ]);
        }
        if($order){
            Cart::where('user_id',auth()->user()->id)->delete();
            return redirect('admin/thank-to');
        }

    }

}

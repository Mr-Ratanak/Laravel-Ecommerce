<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addToCart(Request $req){
        try {
            if(Auth::check()){
                $productId = $req->input('get_cart_id');
                $userId = auth()->user()->id;
                $product = Products::where('id',$productId)->where('status',0)->first();
                $quantity = $req->input('quantity');

                if($quantity <= 0){
                    return response()->json([
                        'status'=>202,
                        'message'=>'Product quantity at least 1',
                    ]);
                }

                $cart = Cart::where('user_id',$userId)->where('product_id',$productId)->first();

                if($product->quantity > 0){
                    if(!$cart){
                        Cart::create([
                            'user_id'=>auth()->user()->id,
                            'product_id'=>$productId,
                            'product_color_id'=>$req->input('selectedColorId'),
                            'quantity'=>$quantity,
                        ]);
                        return response()->json([
                            'status'=>200,
                            'message'=>'Product added to cart'
                    ]);
                    }else{
                        return response()->json([
                            'status'=>201,
                            'message'=>'Product already add to cart'
                    ]);
                    }

                }else{
                    return response()->json([
                        'status'=>402,
                        'message'=>'Quantity Outofstock!',
                    ]);
                }
            }else{
                return response()->json([
                    'status'=>403,
                    'message'=>'Please login first!'
                ]);
            }
        } catch (\Exception $e) {
            echo 'Error : '.$e->getMessage();
        }
    }

    public function countCart(){
        if(Auth::check()){
            $countCart = Cart::where('user_id',auth()->user()->id)->count();
            return $countCart;
        }
    }

    public function viewCart(){
        $user = User::where('role_as', 0)->first();
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        return view('frontend.collection.cart.index',compact('user','carts'));
    }

    public function removeCart(int $cart_id){
        Cart::where('user_id',auth()->user()->id)->where('id',$cart_id)->delete();
        return response()->json(['message'=>'Cart has been remove!']);
    }

    public function updateQty(Request $req){
        $totalPrice = 0;
        $quantity = $req->input('get_qty');
        $itemId = $req->input('itemId');
        $product_cart = Cart::where('id',$itemId)->where('user_id',auth()->user()->id)->first();
        if($product_cart){
            $getPrice = $product_cart->product_cart->selling_price;
        }
        $subTotalPrice = $quantity * $getPrice;
        // echo $totalPrice;

        if($quantity <= 0){
            return response()->json([
                'status'=>201,
                'message'=>'Quantity at least 1',

                ]);
        }else{
            Cart::where('user_id', auth()->user()->id)
            ->where('id',$itemId)
            ->update(['quantity' => $quantity]);
            return response()->json([
                'status'=>200,
                'message'=> $subTotalPrice,
            ]);
        }
    }



}

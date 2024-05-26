<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);
        return view('frontend.collection.order.index',compact('orders'));
    }
    public function view($orderId){
        $viewOrder = Order::where('user_id',Auth::user()->id)->where('id',$orderId)->first();

        return view('frontend.collection.order.view',compact('viewOrder'));
    }

}

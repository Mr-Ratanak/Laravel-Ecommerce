<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\invoiceOrderMailable;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $req){
        // $orderDate = Carbon::now();
        // $orders = Order::whereDate('created_at',$orderDate)->paginate(10);
        // return $orders = Order::orderBy('created_at','DESC')->paginate(10);

        // else condition
        // ,function ($q) use ($todayDate){
        //     return $q->whereDate('created_at',$todayDate);
        // }

        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($req->date != null, function($q) use ($req){
            return $q->whereDate('created_at',$req->date);
        })->when($req->status != null, function ($q) use ($req){
            return $q->where('status_message', $req->status);
        })->paginate(10);

        return view('admin.order.index',compact('orders'));
    }
    public function view($orderId){
        $viewOrder = Order::where('id',$orderId)->first();
        return view('admin.order.view',compact('viewOrder'));
    }
    public function updateOrderStatus(int $order_id , Request $req){
        $updateOrder = Order::where('id',$order_id)->first();
        $updateOrder->update([
            'status_message'=>$req->order_status,
        ]);
        if($updateOrder){
            return redirect('admin/order/'.$order_id)->with('success','Status message updated!');
        }else{
            return redirect('admin/order/'.$order_id)->with('error','Status not found!');
        }
    }


    public function viewInvoice($orderId){
        $data['order'] = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice',$data);
    }

    public function generateInvoice(int $order_id){
        $todayDate = Carbon::now()->format('d-m-Y');
        $order = Order::findOrFail($order_id);
        $data = ['order'=>$order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice',$data);
        return $pdf->download('invoice '.$order->id.'-'.$todayDate.'.pdf');
        // documentation for pdf invoice
        // https://github.com/barryvdh/laravel-dompdf
    }

    public function mailInvoice(int $orderId){
        try {
            $order = Order::findOrFail($orderId);

            Mail::to("$order->email")->send(new invoiceOrderMailable($order));
            return redirect('admin/order/'.$orderId)->with('success','Invoice has been send to '.$order->email);
        } catch (\Exception $e) {
            return redirect('admin/order/'.$orderId)->with('message','Something went wrong!');
        }
    }


}

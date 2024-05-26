@extends('layouts.admin')
@section('css')
    <style>
        .head-cat{
            display: flex;
            justify-content: space-between;
        }
    </style>
@endsection
@section('content')


<div class="container-fluid">
    @component('components.alerts')
        
    @endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="d-flex pt-2 justify-content-between"><span class="pt-2">Order List</span>
                        <a href="{{url('admin/products/create')}}" class="btn btn-primary float-end" >Add Product</a>
                    </h5>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row ">
                        <div class="col-md-3">
                            <label for="">Filter by date</label>
                            <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d')}}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Filter by status</label>
                            <select name="status" id="" class="form-control">
                                <option value="">--Select status--</option>
                                <option value="In progress" {{Request::get('status') == 'In progress' ? 'selected':''}}>In Progress</option>
                                <option value="completed" {{Request::get('status') == 'completed' ? 'selected':''}}>Completed</option>
                                <option value="pending" {{Request::get('status') == 'pending' ? 'selected':''}}>Pending</option>
                                <option value="cancelled" {{Request::get('status') == 'cancelled' ? 'selected':''}}>Cancelled</option>
                                <option value="out-of-for-delivery" {{Request::get('status') == 'out-of-for-delivery' ? 'selected':''}}>Out For Delivery</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="pt-2"><button class="btn btn-primary mt-4" type="submit">Filter</button></div>
                        </div>
                    </div>
                    </form>
                   <div class="table-responsive">
                    <table class="table table-hover">
                        <div class="shadow bg-white p-3">
                            <hr>
                            <thead>
                                <tr>
                                    <th>OrderID</th>
                                    <th>Tracking No</th>
                                    <th>Username</th>
                                    <th>Payment Mode</th>
                                    <th>Order Date</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                        <tr>
                                            <td>00{{$order->id}}</td>
                                            <td>{{$order->tracking_no}}</td>
                                            <td>{{$order->fullname}}</td>
                                            <td>{{$order->payment_mode}}</td>
                                            <td>{{$order->created_at->format('d-m-Y h:i-A')}}</td>
                                            <td>{{$order->status_message}}</td>
                                            <td><a href="{{url('admin/order/'.$order->id)}}" class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                    @empty 
                                    <h2 class="text-center py-4">No order avialable</h2>
                                @endforelse
                            </tbody>
                        </div>
                    </table>
                       <div class="d-flex justify-content-center my-2">
                           {!!$orders->links()!!}
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
     
 </div>

 
@endsection
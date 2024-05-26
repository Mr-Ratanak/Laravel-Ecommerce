@extends('layouts.admin')
@section('title','Order')
@section('content')
    <div class="container">
        @component('components.alerts')

        @endcomponent
        <div class="row">
            <div class="col-md-12">
               <div class="card my-2 shadow-sm p-3">
                <h4 class="text-primary mx-2 pt-4 m-0 fw-bolder d-flex justify-content-between">
                    <span><i class="fa fa-shopping-cart text-dark"></i> See All Order Details</span>
                    <div class="float-end">
                    <a href="{{url('admin/order')}}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> Go Back</a>
                    <a href="{{url('admin/invoice/'.$viewOrder->id.'/generate-invoice')}}" class="btn btn-warning btn-sm mx-1"><i class="fa fa-download"></i> Download Invoice</a>
                    <a href="{{url('admin/invoice/'.$viewOrder->id)}}" target="_blank" class="btn btn-primary btn-sm mx-1"><i class="ti-receipt"></i> View Invoice</a>
                    <a href="{{url('admin/invoice/'.$viewOrder->id.'/mail')}}" class="btn btn-info
                         btn-sm mx-1"><i class="ti-receipt"></i> Send Invoice with Mail</a>
                </div>
                </h4>
                <hr>
                <div class="row">
                    <div class="col-md-6 border border-left bg-light">
                        <h3 class="fw-bolder text-center">Order Details</h3>
                        <hr>
                        <h5 class="fw-bold py-1">- Order Id : {{$viewOrder->id}}</h5>
                        <h5 class="fw-bold py-1">- Tracking No : {{$viewOrder->tracking_no}}</h5>
                        <h5 class="fw-bold py-1">- Ordered Date : {{$viewOrder->created_at->format('m-d-Y h:i A')}}</h5>
                        <h5 class="fw-bold py-1">- Payment Mode : {{$viewOrder->payment_mode}}</h5>
                        <h6 class="w-50 text-success p-2 rounded-2 border border-secondary ">
                            <span class="text-success fw-bolder">Order Status Message : {{$viewOrder->status_message}}</span>
                        </h6>
                        <h3>Order Items</h3>
                    </div>
                    <div class="col-md-6 border border-right bg-light">
                        <h3 class="fw-bolder text-center">User Details</h3>
                        <hr>
                        <h5 class="fw-bold py-1">- Full Name : {{$viewOrder->fullname}}</h5>
                        <h5 class="fw-bold py-1">- E-Mail : {{$viewOrder->email}}</h5>
                        <h5 class="fw-bold py-1">- Phone : {{$viewOrder->phone}}</h5>
                        <h5 class="fw-bold py-1">- Address : {{$viewOrder->address}}</h5>
                        <h5 class="fw-bold py-1">- Pin Code : {{$viewOrder->pincode}}</h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-striped table-bordered shadow-sm">
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalAmount = 0;
                                    @endphp
                                    @forelse ($viewOrder->orderItem as $order)
                                            <tr>
                                                <td>{{$order->id}}</td>
                                                <td>
                                                    @if ($order->product->productImages)
                                                    <img src="{{asset('uploaded/products/'.$order->product->productImages[0]->images)}}" style="width: 50px; height: 50px" alt="">
                                                    {{-- for product color have any problem  --}}
                                                    @if ($order->productColors)
                                                        @if ($order->productColors->color)
                                                        <span>- Colors : {{$order->productColors->color->name}}</span>
                                                        @endif
                                                    @endif
                                                    @endif
                                                </td>
                                                <td>{{$order->product->name}} </td>
                                                <td>{{$order->price}}</td>
                                                <td>{{$order->quantity}}</td>
                                                <td>{{$order->price * $order->quantity}}</td>
                                                <td hidden>{{$totalAmount += $order->price * $order->quantity}}</td>
                                            </tr>
                                        @empty
                                        <h2 class="text-center py-4">No product order avialable</h2>

                                    @endforelse
                                    <div class="row">
                                        <td colspan="5" class="fw-bold fs-4">Total Amount : </td>
                                        <td colspan="1" class="fw-bold fs-4 text-primary"><span class="text-danger">$</span> {{$totalAmount}}/-</td>
                                    </div>
                                </tbody>
                        </table>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-2">
                            <h2 class="text-success">Order Process (Order status updates) </h2>
                            <hr>
                            <form action="{{url('admin/order/view/'.$viewOrder->id)}}" method="POST">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="row">
                                <div class="col-md-4">
                                    <label for="status_up" class="form-label">Update Your Status</label>
                                    <div class="form-group d-flex">
                                        <select name="order_status" id="status_up" class="form-control rounded-0">
                                            <option value="">--SELECT ORDER STATUS--</option>
                                            <option value="in progress" {{$viewOrder->status_message == 'in progress' ? 'selected':''}}>In Progress</option>
                                            <option value="completed" {{$viewOrder->status_message == 'completed' ? 'selected':''}}>Completed</option>
                                            <option value="pending" {{$viewOrder->status_message == 'pending' ? 'selected':''}}>Pending</option>
                                            <option value="cancelled" {{$viewOrder->status_message == 'cancelled' ? 'selected':''}}>Cancelled</option>
                                            <option value="out of for delivery" {{$viewOrder->status_message == 'out of for delivery' ? 'selected':''}}>Out For Delivery</option>
                                        </select>
                                        <button class="btn btn-primary rounded-0" type="submit">Update</button>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="text-dark pt-4 float-end">Current Order Status : <span class="text-uppercase text-success">{{$viewOrder->status_message}}</span></h4>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>

               </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
          $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            countCart();
           function countCart(){
            $.ajax({
                url: "/cart/count",
                type: "GET",
                success: function(response) {
                    $("#countcart").text(response);
                }
            })
           }

           countWishlist();
           function countWishlist(){
            $.ajax({
                url: "/wishlist/count",
                type: "GET",
                success: function(response) {
                    $("#count").text(response);
                }
            });
           }

          });
    </script>
@endsection

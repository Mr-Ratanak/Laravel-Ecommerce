@extends('layouts.app')
@section('title','Order')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-striped table-bordered table-hover">
                    <div class="shadow bg-white p-3">
                        <h2 class="text-center text-primary mb-3">My Orders</h2>
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
                                        <td><a href="{{url('order/'.$order->id)}}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                @empty 
                                <h2 class="text-center py-4">No order avialable</h2>
                            @endforelse
                        </tbody>
                </div>
                </table>
                <div class="d-flex justify-content-center my-2 p-1">{!!$orders->links()!!}</div>
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
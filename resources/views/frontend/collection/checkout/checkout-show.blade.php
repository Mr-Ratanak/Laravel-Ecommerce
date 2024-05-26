@extends('layouts.app')
@section('title','Checkout Product')
@section('content')
<div class="py-3 py-md-4 checkout">
    <div class="container">
        @component('components.alerts')
        @endcomponent
        <h4>Checkout</h4>
        <hr>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="shadow bg-white p-3">
                    <h4 class="text-primary">
                        Item Total Amount :
                        <span class="float-end">${{$totalCheck}}</span>
                    </h4>
                    <hr>
                </div>
            </div>
            @if ($totalCheck != '0')
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="text-primary">
                        Basic Information
                    </h4>
                    <hr>

                    <form action="{{url('checkout/store')}}" method="POST" id="checkout-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter Full Name" value="{{Auth::user()->name ?? ''}}"/>
                                @error('fullname')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone Number</label>
                                <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" value="{{Auth::user()->userDetail->phone ?? ''}}"/>
                                @error('phone')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email Address" value="{{Auth::user()->email ?? ''}}"/>
                                @error('email')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Pin-code (Zip-code)</label>
                                <input type="number" name="pincode" id="pincode" class="form-control" placeholder="Enter Pin-code" value="{{Auth::user()->userDetail->flat_no ?? ''}}"/>
                                @error('pincode')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Full Address</label>
                                <textarea name="address" id="address" class="form-control" rows="2">{{auth()->user()->userDetail->address ?? ''}}</textarea>
                                @error('address')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Select Payment Mode: </label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>
                                        <button
                                        {{auth()->user()->userDetail->phone ?? 'disabled'}}
                                        {{auth()->user()->userDetail->address ?? 'disabled'}}
                                        {{auth()->user()->userDetail->flat_no ?? 'disabled'}}
                                            class="nav-link fw-bold onlinePay" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Cash on Delivery Mode</h6>
                                            <hr/>
                                            <button type="submit" class="btn btn-primary">Place Order (Cash on Delivery)</button>
                                        </div>
                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                            <h6>Online Payment Mode</h6>
                                            <hr/>
                                            <div class="">
                                                <div id="paypal-button-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="card shadow-sm text-center text-primary p-2">
                    <h4 class="text-center py-2">No any item in cart</h4>
                    <a href="{{url('/collection')}}" class="btn btn-warning text-white">Go Shopping</a>
                </div>
            </div>
            @endif


        </div>
    </div>
</div>
@endsection


@section('script')
<script src="https://www.paypal.com/sdk/js?client-id=ATGnmLPRrh9_5jQYYgElSZ3G56lVZ_PIa75-jGckD4X06LbBecdccWHvSOcC9D-ba0O5ptVkbwKUsXE1&currency=USD"></script>
<script>

          $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click','.onlinePay', function(e){
                e.preventDefault();

                $.ajax({
                    url: "admin/checkout/online",
                    type: "POST",
                    data: $("#checkout-form").serialize(),
                    success: function(response){
                        window.location.href="admin/thank-to";
                    }
                })
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


    window.paypal
    .Buttons({
    createOrder(data, actions) {
      try {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '{{$totalCheck}}'
                }
            }]
        });


      } catch (error) {
        console.error(error);
        resultMessage(`Could not initiate PayPal Checkout...<br><br>${error}`);
      }
    },
    onApprove(data, actions) {
      try {
       return actions.order.capture().then(function(){
        // alert('Transaction completed by '+ details.payer.name.fullname);
        $.ajax({
            url: "admin/checkout/online",
            type: "POST",
            data: $(this).serialize(),
            success: function(response){
                window.location.reload();
            }
        });

       });
      } catch (error) {
        console.error(error);
        resultMessage(
          `Sorry, your transaction could not be processed...<br><br>${error}`,
        );
      }
    },
  })
  .render("#paypal-button-container");

    // Example function to show a result to the user. Your site's UI library can be used instead.
    function resultMessage(message) {
    const container = document.querySelector("#result-message");
    container.innerHTML = message;
    }

</script>



@endsection

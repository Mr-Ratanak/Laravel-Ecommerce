@extends('layouts.app')
@section('title','View Cart')
    
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">

                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                        <div class="row">
                            <div class="col-md-4">
                                <h4>Products Cart</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Total</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @forelse ($carts as $cartitem)
                        <div class="cart-item cart-row">
                            <div class="row">
                                <div class="col-md-4 my-auto">
                                    <a href="{{url('/collection/'.$cartitem->product_cart->Category->slug.'/'.$cartitem->product_cart->slug)}}">
                                        <label class="product-name">
                                            <img src="{{asset('uploaded/products/'.$cartitem->product_cart->productImages[0]->images)}}" style="width: 50px; height: 50px" alt="">
                                            {{$cartitem->product_cart->name}} 
                                            @if ($cartitem->productColor)
                                                @if ($cartitem->productColor->color)
                                                <span>- Colors : {{$cartitem->productColor->color->name}}kj</span>
                                                @endif
                                            @endif
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">${{$cartitem->product_cart->selling_price}} </label>
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group record">
                                            <span data-item-id="{{$cartitem->id}}" class="Decrement upd-btn-qty btn btn1"><i class="fa fa-minus"></i></span>
                                            <input type="text" value="{{$cartitem->quantity}}" id="quantity" class="upd-qty input-quantity" />
                                            <span data-item-id="{{$cartitem->id}}" class="Increment upd-btn-qty btn btn1"><i class="fa fa-plus"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">$ <span id="total_price_{{$cartitem->id}}">{{$cartitem->product_cart->selling_price * $cartitem->quantity}}</span> </label>
                                @php
                                    $totalPrice += $cartitem->product_cart->selling_price * $cartitem->quantity;
                                @endphp
                                </div>
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button type="button" id="{{$cartitem->id}}" class="removeCart btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h5 class="text-center">No Cart added here!</h5>  
                   @endforelse
                            
                </div>
            </div>
        </div>

        <div class="row mt-5 align-items-center">
            <div class="col-8">
                <h3 class="fw-bolder">Get the best deals & Offer <a href="{{url('/collection')}}">Shop Now</a></h3>
            </div>
            <div class="col-4">
                <div class="card shadow-sm">
                    <div class="p-2 d-flex justify-content-between mt-2">
                        <h4 class="fw-bolder">Total : </h4>
                        <h4 class="fw-bold text-danger" id="all_total">$ {{$totalPrice}} /-</h4>
                    </div>
                    <hr class="p-2">
                    <a href="{{url('/checkout')}}" class="p-2 mb-2 mx-2 btn btn-warning">Checkout</a>
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

            $('.Increment').on('click', function() {
                var $this = $(this);
                if (!$this.hasClass('disabled')) {
                    $this.addClass('disabled');
                    var $count = $this.closest('.record').find('.input-quantity');
                    var currentCount = parseInt($count.val());
                    $count.val(currentCount + 1);
                    
                    setTimeout(function() {
                    $this.removeClass('disabled');
                    }, 1000); // Re-enable after 1 second (adjust as needed)
                }
                });


                $('.Decrement').on('click', function() {
                var $this = $(this);
                if (!$this.hasClass('disabled')) {
                    $this.addClass('disabled');
                    var $count = $this.closest('.record').find('.input-quantity');
                    var currentCount = parseInt($count.val());
                    $count.val(currentCount - 1);
                    
                    setTimeout(function() {
                    $this.removeClass('disabled');
                    }, 1000); // Re-enable after 1 second (adjust as needed)
                }
                });

            $(document).on('click','.removeCart', function(){
                var cart_id = $(this).attr('id');
                var clickThis = $(this);
                $.ajax({
                    url: "/cart/remove/"+cart_id,
                    type: "GET",
                    success: function(response){
                        clickThis.closest('.cart-row').remove();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(response.message).dismissOthers();
                        countCart();
                        
                    }
                })

            });

            countWishlist();
            function countWishlist(){
                $.ajax({
                    url: "/wishlist/count",
                    type: "GET",
                    success: function(response) {
                        $("#count").text(response);
                    }
                })
            }

            countCart();
            function countCart(){
                $.ajax({
                    url: "/cart/count",
                    type: "GET",
                    success: function(response) {
                        $("#countcart").text(response);
                    }
                });
            }

            $('.upd-btn-qty').on('click', function(){
                var itemId = $(this).data('item-id');
                var get_qty = $(this).closest('.record').find('.input-quantity').val();
                // alert(itemId);
                $.ajax({
                    url: "/cart/update",
                    type: "POST",
                    data: {
                        get_qty:get_qty,
                        itemId:itemId,
                    },
                    success: function(response){
                        if(response.status === 201){
                            alertify.set('notifier','position', 'top-right');
                            alertify.warning(response.message).dismissOthers();
                        }else if(response.status === 200){
                            alertify.set('notifier','position', 'top-right');
                            alertify.success('Quantity has been updated').dismissOthers();
                            $('#total_price_' + itemId).text(response.message);
                        }
                    }
                });

            });


        });
    </script>
@endsection

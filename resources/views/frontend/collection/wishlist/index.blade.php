@extends('layouts.app')

@section('title','Wishlist')

@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">

                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Products</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>

                    @forelse ($wishlists as $wishlist)
                        @if ($wishlist->product_wishlist)
                            <div class="cart-item wishlist-row">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="{{url('collection/'.$wishlist->product_wishlist->Category->slug.'/'.$wishlist->product_wishlist->slug)}}">
                                            <label class="product-name">
                                                <img src="{{asset('uploaded/products/'.$wishlist->product_wishlist->productImages[0]->images)}}" style="width: 50px; height: 50px" alt="">
                                                {{$wishlist->product_wishlist->name}}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price">${{$wishlist->product_wishlist->original_price}} </label>
                                    </div>
                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group record">
                                                <span class="Decrement btn btn1"><i class="fa fa-minus"></i></span>
                                                <input type="text" id="quantity" value="1" class="input-quantity" />
                                                <span class="Increment btn btn1"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <button type="button" id="{{$wishlist->id}}" class="removeWishlist btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <p class="text-center mx-auto">No Wishlist found!</p>
                    @endforelse


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
        var $count = $(this).closest('.record').find('.input-quantity');
        var currentCount = parseInt($count.val());
        $count.val(currentCount + 1);
    });

    $('.Decrement').on('click', function() {
        var $count = $(this).closest('.record').find('.input-quantity');
        var currentCount = parseInt($count.val());
        if (currentCount > 0) {
            $count.val(currentCount - 1);
        }
    });

    $(document).on('click','.removeWishlist', function(){
        var wishlist_id = $(this).attr('id');
        var clickThis = $(this);
        $.ajax({
            url: "/wishlist/remove/"+wishlist_id,
            type: "GET",
            success: function(response){
                clickThis.closest('.wishlist-row').remove();
                alertify.set('notifier','position', 'top-right');
                alertify.success(response.message).dismissOthers();
                countWishlist();
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

        });
    </script>
@endsection

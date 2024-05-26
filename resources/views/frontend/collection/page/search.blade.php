@extends('layouts.app')
@section('title','Search')

@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="welcome-page mb-4" style="margin-top: -2rem;">
                    <div class="trending">
                        <h3>Search Results <div class="underline"></div> </h3>
                    </div>
                </div>
            </div>

            @forelse ($results as $productItem)
            <div class="row">
                <div class="product-card d-flex align-items-center overflow-hidden">
                    <div class="col-md-3 product-card-img w-20 h-20 align-items-start">
                        <label class="stock bg-success">NEW</label>
                        @if ($productItem->productImages->count() > 0)
                        <a href="{{url('/collection/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                        <img src="{{asset('uploaded/products/'.$productItem->productImages[0]->images.'')}}" alt="{{$productItem->name}}">
                        </a>
                        @endif

                    </div>
                    <div class="col-md-9 product-card-body">
                        <p class="product-brand">{{$productItem->brand}}</p>
                        <h5 class="product-name">
                           <a href="{{url('/collection/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                {{$productItem->name}}
                           </a>
                        </h5>
                        <div>
                            <span class="selling-price">${{$productItem->selling_price}}</span>
                            <span class="original-price">${{$productItem->original_price}}</span>
                        </div>
                        <div class="">
                            <h5 class="fw-bold">Description</h5>
                            <p>{{strlen($productItem->description) > 300 ? substr($productItem->description,1,300).'...' : substr($productItem->description,1,300) }}
                            </p>
                            </div>
                        <div class="mt-2">
                            <button type="button" id="{{$productItem->id}}" class="add_to_cart btn btn1">Add To Cart</button>
                            <button type="button" id="{{$productItem->id}}" class="add_to_wishlist btn btn1"> <i class="fa fa-heart"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-md-12">
                    <div class="py-2 text-center">No products search found!</div>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center my-2">
            {{-- {!!$results->links()!!} --}}
            {!! $results->appends(['search' => request()->query('search')])->links() !!}
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

           $(document).on('click','.add_to_wishlist', function(){
                var product_id = $(this).attr('id');
                // console.log(data);
                $.ajax({
                    url: "/collection/add_to_wishlist",
                    type: "POST",
                    data: {
                        product_id: product_id,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response){
                       if(response.status == 200){
                        countWishlist();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(response.message).dismissOthers();
                       }else{
                        countWishlist();
                        alertify.set('notifier','position', 'top-right');
                        alertify.warning(response.message).dismissOthers();
                       }
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

            //    add to cart
            $(document).on('click','.add_to_cart', function(){
                var get_cart_id = $(this).attr('id');
                var quantity = $('.recordQty .input-quantity').data('record-id');
                var selectedColorId = $('input[name="colorSelection"]:checked').val();
                // alert(selectedColorId);
                $.ajax({
                    url: "/collection/add_to_cart",
                    type: "POST",
                    data: {
                        get_cart_id:get_cart_id,
                        quantity:quantity,
                        selectedColorId:selectedColorId,
                    }
                    ,success: function(response){
                        if(response.status === 403){
                            alertify.set('notifier','position', 'top-right');
                            alertify.warning(response.message).dismissOthers();
                        }else if(response.status === 402){
                            alertify.set('notifier','position', 'top-right');
                            alertify.warning(response.message).dismissOthers();
                        }else if(response.status === 201){
                            alertify.set('notifier','position', 'top-right');
                            alertify.warning(response.message).dismissOthers();
                        }else if(response.status === 202){
                            alert(response.message);
                        }else if(response.status === 200){
                            countCart();
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(response.message).dismissOthers();
                        }
                    }
                });
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




        });
    </script>
@endsection

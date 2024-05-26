@extends('layouts.app')
@section('title','Arrival Product')
    
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="welcome-page">
            <h2 class="text-center py-2">ផលិតផលថ្មីៗនៅក្នុងស្តុក <span class="text-warning">KH-Ecommerce</span> 
                <div class="underline"></div>
            </h2>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia officia totam earum culpa incidunt atque dignissimos quae? Ad dolore, at id temporibus, alias eaque, facilis sunt velit ut ratione expedita.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia officia totam earum culpa incidunt atque dignissimos quae? Ad dolore, at id temporibus, alias eaque, facilis sunt velit ut ratione expedita.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia officia totam earum culpa incidunt atque dignissimos quae? Ad dolore, at id temporibus, alias eaque, facilis sunt velit ut ratione expedita.
            </p>

            <div class="trending">
                <h3>New Arrivals <div class="underline"></div></h3>
            </div>
        </div>
    </div>
</div>
<div class="row mx-4 mt-4 ">
        @forelse ($arrivalProduct as $productItem)
            <div class="item col-md-3">
                <div class="product-card">
                <div class="product-card-img">
                    <label class="stock bg-success">New</label>
                    @if ($productItem->productImages->count() > 0)
                    <a href="{{url('/collection/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                    <img src="{{asset('uploaded/products/'.$productItem->productImages[0]->images.'')}}" alt="{{$productItem->name}}">    
                    </a>
                    @endif
                    
                </div>
                <div class="product-card-body">
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
                    <div class="mt-2">
                        <button type="button" id="{{$productItem->id}}" class="add_to_cart btn btn1">Add To Cart</button>
                        <button type="button" id="{{$productItem->id}}" class="add_to_wishlist btn btn1"> <i class="fa fa-heart"></i> </button>
                        <a href="" download="none" class="btn btn1"> Download </a>
                    </div>
                </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <div class="py-2 text-center">No arrival products avialable!</div>
            </div>
        @endforelse
        <div class="col-md-12 d-flex justify-content-center">
            <a href="{{url('/collection')}}" class="btn btn-outline-primary rounded-0">View More</a>
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
                        countWishlist();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(response.message).dismissOthers();
                    }
                })
           });

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
            })
           }


        });

        // owl caruosel 
        // $('.trending-product').owlCarousel({
        //     loop:true,
        //     margin:10,
        //     nav:false,
        //     dots: true,
        //     responsive:{
        //         0:{
        //             items:1
        //         },
        //         600:{
        //             items:3
        //         },
        //         1000:{
        //             items:4
        //         }
        //         }
        // })
     
    </script>
@endsection
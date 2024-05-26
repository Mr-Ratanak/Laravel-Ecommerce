@extends('layouts.app')
@section('title','Home Page')
@section('css')

@endsection

@section('content')
{{-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

    <div class="carousel-inner">
        @foreach ($slides as $key => $slide)
        <div class="carousel-item active">
            <img src="{{asset('uploaded/slides/'.$slide->image.'')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1>
                        {!!$slide->title!!}
                    </h1>
                    <p>
                       {{$slide->description}}
                    </p>
                    <div>
                        <a href="#" class="btn btn-slider">
                            Get Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> --}}

<div class="swiper mySlide">
    <div class="swiper-wrapper">
        @foreach ($slides as $key => $slide)
        <div class="swiper-slide">
            <div class="image">
                <img src="{{asset('uploaded/slides/'.$slide->image.'')}}" alt="...">
            </div>
            <div class="slide-content">
                <h1>{!!$slide->title!!}</h1>
                <p>{{$slide->description}}</p>
                <a href="#" class="btn btn-slider">Get Now</a>
            </div>
        </div>
      @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="welcome-page">
            <h2 class="text-center py-2">សូមស្វាគមន៍មកកាន់ <span class="text-warning">KH-Ecommerce</span>
                <div class="underline"></div>
            </h2>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia officia totam earum culpa incidunt atque dignissimos quae? Ad dolore, at id temporibus, alias eaque, facilis sunt velit ut ratione expedita.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia officia totam earum culpa incidunt atque dignissimos quae? Ad dolore, at id temporibus, alias eaque, facilis sunt velit ut ratione expedita.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia officia totam earum culpa incidunt atque dignissimos quae? Ad dolore, at id temporibus, alias eaque, facilis sunt velit ut ratione expedita.
            </p>

            <div class="trending">
                <h3>Trending Product <div class="underline"></div></h3>
            </div>
        </div>
    </div>
</div>

<div class="row mx-4 mt-4 ">
    @if ($trending)
    <div class="owl-carousel owl-theme owl-carousel-product">
        @foreach ($trending as $productItem)
            <div class="item">
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
        @endforeach
    </div>
    @else
        <div class="col-md-12">
            <div class="py-2 text-center">No products avialable!</div>
        </div>
    @endif

</div>
{{-- arrival product slider --}}
<div class="welcome-page">
    <div class="trending">
        <h3>Arrivals Product <div class="underline"></div> <a href="{{url('/new-arrival')}}" class="btn btn-warning text-white float-end rounded-0">See more</a></h3>
    </div>
</div>
<div class="row mx-4 mt-3 ">
    @if ($arrivalProduct)
    <div class="owl-carousel owl-theme owl-carousel-product">
        @foreach ($arrivalProduct as $productItem)
            <div class="item">
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
        @endforeach
    </div>
    @else
        <div class="col-md-12">
            <div class="py-2 text-center">No arrival products avialable!</div>
        </div>
    @endif

</div>

{{-- featured product slider  --}}
<div class="welcome-page">
    <div class="trending">
        <h3>Featured Product <div class="underline"></div><a href="{{url('/new-featured')}}" class="btn btn-warning text-white float-end rounded-0">See more</a></h3>
    </div>
</div>
<div class="row mx-4 mt-3 ">
    @if ($newFeatured)
    <div class="owl-carousel owl-theme owl-carousel-product">
        @foreach ($newFeatured as $productItem)
            <div class="item">
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
        @endforeach
    </div>
    @else
        <div class="col-md-12">
            <div class="py-2 text-center">No featured products avialable!</div>
        </div>
    @endif

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
                var quantity = 1;
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
            });
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
        $('.owl-carousel-product').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
                }
        })
        // swiper
        var swiper = new Swiper(".mySlide", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            });
    </script>
@endsection

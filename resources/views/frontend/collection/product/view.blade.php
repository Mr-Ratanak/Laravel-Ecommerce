@extends('layouts.app')
@section('title')
    {{ $category->meta_title }}
@endsection
@section('meta_keyword')
    {{ $category->meta_keyword }}
@endsection
@section('meta_description')
    {{ $category->meta_description }}
@endsection

@section('content')
    <div class="py-3 py-md-5 bg-light">
        @component('components.alerts')
        @endcomponent
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if ($product->productImages)
                            {{-- <img src="{{asset('uploaded/products/'.$product->productImages[0]->images)}}" class="w-100"
                        alt="Img"> --}}
                            <div class="exzoom" id="exzoom">
                                <!-- Images -->
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @if ($product->productImages)
                                            @foreach ($product->productImages as $image)
                                                <li><img src="{{ asset('uploaded/products/' . $image->images) }}" /></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                                <div class="exzoom_nav"></div>
                                <!-- Nav Buttons -->
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn">
                                        < </a>
                                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                </p>
                            </div>
                        @else
                            No Image added
                        @endif

                    </div>
                    {{-- <div class="card rounded-0">
                    <div class="row">
                        <div class="col-4 d-flex">
                            @if ($product->productImages)
                            @foreach ($product->productImages as $image)
                            <img src="{{asset('uploaded/products/'.$image->images)}}" class="img-thumbnail mx-1"
                                alt="Img" style="height: 100px; width: 100px">
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div> --}}


                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                            <label
                                class="label-stock bg-success {{ $product->quantity > 0 ? 'bg-success' : 'bg-danger' }}">{{ $product->quantity > 0 ? 'In Stock' : 'Out Stock' }}</label>
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">${{ $product->selling_price }}</span>
                            <span class="original-price">${{ $product->original_price }}</span>
                        </div>
                        <div class="mt-2">
                            <div class="input-group recordQty">
                                <span class="Decrement btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" id="quantity" name="quantity" record-id value="1" class="input-quantity" />
                                <span class="Increment btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            @if ($product->productColors->count() > 0)
                                @if ($product->productColors)
                                    @foreach ($product->productColors as $colorItem)
                                        <div class="d-flex m-1 p-1 text-light recordColor"
                                            style="background: {{ $colorItem->color->name }}; width: fit-content; border-radius: 5px; ">
                                            <input class="colorSelection" type="radio"
                                                value="{{ $colorItem->color->id }}" name="colorSelection"><label
                                                for="colorSelection">{{ $colorItem->color->name }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                        <div class="mt-2">
                            <button type="button" id="{{ $product->id }}" class="add_to_cart btn btn1"><i
                                    class="fa fa-shopping-cart"></i> Add To Cart</button>
                            <button type="button" id="{{ $product->id }}" class="add_to_wishlist btn btn1"><i
                                    class="fa fa-heart"></i> Add To Wishlist</button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- related product --}}
            <div class="welcome-page">
                <div class="trending">
                    <h3>Related @if ($category)
                            {{ $category->name }}
                        @endif Product <div class="underline"></div>
                    </h3>
                </div>
            </div>
            <div class="row mx-4 mt-4 ">
                <div class="owl-carousel owl-theme owl-carousel-product">
                    @forelse ($category->relatedProducts as $productItem)
                    <div class="item ">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($productItem->productImages->count() > 0)
                                    <a
                                        href="{{ url('/collection/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        <img src="{{ asset('uploaded/products/' . $productItem->productImages[0]->images . '') }}"
                                            alt="{{ $productItem->name }}">
                                    </a>
                                @endif

                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand }}</p>
                                <h5 class="product-name">
                                    <a
                                        href="{{ url('/collection/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        {{ $productItem->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">${{ $productItem->selling_price }}</span>
                                    <span class="original-price">${{ $productItem->original_price }}</span>
                                </div>
                                <div class="mt-2">
                                    <button type="button" id="{{ $productItem->id }}" class="add_to_cart btn btn1">Add To
                                        Cart</button>
                                    <button type="button" id="{{ $productItem->id }}" class="add_to_wishlist btn btn1"> <i
                                            class="fa fa-heart"></i> </button>
                                    <a href="https://t.me/RonRatanak" class="btn btn1"><i class="fa fa-share"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="py-2 text-center">No products related avialable!</div>
                    </div>
                @endforelse
                </div>

                <div class="col-md-12 d-flex justify-content-center">
                    <a href="{{ url('/collection') }}" class="btn btn-outline-primary rounded-0">View More</a>
                </div>

            </div>

            {{-- related brand --}}
            <div class="welcome-page">
                <div class="trending">
                    <h3>Related @if ($product)
                            {{ $product->brand }}
                        @endif Brands <div class="underline"></div>
                    </h3>
                </div>
            </div>
            <div class="row mx-4 mt-4 ">
                <div class="owl-carousel owl-theme owl-carousel-product">
                    @forelse ($category->relatedProducts as $productItem)
                    @if ($productItem->brand == "$product->brand")
                        <div class="item">
                            <div class="product-card">
                                <div class="product-card-img">
                                    @if ($productItem->productImages->count() > 0)
                                        <a
                                            href="{{ url('/collection/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                            <img src="{{ asset('uploaded/products/' . $productItem->productImages[0]->images . '') }}"
                                                alt="{{ $productItem->name }}">
                                        </a>
                                    @endif

                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{ $productItem->brand }}</p>
                                    <h5 class="product-name">
                                        <a
                                            href="{{ url('/collection/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                            {{ $productItem->name }}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">${{ $productItem->selling_price }}</span>
                                        <span class="original-price">${{ $productItem->original_price }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" id="{{ $productItem->id }}"
                                            class="add_to_cart btn btn1">Add To Cart</button>
                                        <button type="button" id="{{ $productItem->id }}"
                                            class="add_to_wishlist btn btn1"> <i class="fa fa-heart"></i> </button>
                                        <a href="https://t.me/RonRatanak" class="btn btn1"><i
                                                class="fa fa-share"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-md-12">
                        <div class="py-2 text-center">No products related avialable!</div>
                    </div>
                @endforelse
                </div>

                <div class="col-md-12 d-flex justify-content-center">
                    <a href="{{ url('/collection') }}" class="btn btn-outline-primary rounded-0">View More</a>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let value = 1;

            $(document).on('click', '.Increment', function() {
                value++;
                $('#quantity').val(value);
                $('.recordQty .input-quantity').data('record-id', value);
            })
            $(document).on('click', '.Decrement', function() {
                if (value > 0) {
                    value--;
                    $('#quantity').val(value);
                    $('.recordQty .input-quantity').data('record-id', value);
                }
            });

            //    add to wishlist
            $(document).on('click', '.add_to_wishlist', function() {
                var product_id = $(this).attr('id');
                // console.log(data);
                $.ajax({
                    url: "/collection/add_to_wishlist",
                    type: "POST",
                    data: {
                        product_id: product_id,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        countWishlist();
                        if (response.status === 200) {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(response.message).dismissOthers();
                        } else {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.warning(response.message).dismissOthers();
                        }
                    }
                })
            });
            countWishlist();

            function countWishlist() {
                $.ajax({
                    url: "/wishlist/count",
                    type: "GET",
                    success: function(response) {
                        $("#count").text(response);
                    }
                });
            }
            //    add to cart
            $(document).on('click', '.add_to_cart', function() {
                var get_cart_id = $(this).attr('id');
                var quantity = $('.recordQty .input-quantity').val();
                var selectedColorId = $('input[name="colorSelection"]:checked').val();
                // alert(quantity);

                $.ajax({
                    url: "/collection/add_to_cart",
                    type: "POST",
                    data: {
                        get_cart_id: get_cart_id,
                        quantity: quantity,
                        selectedColorId: selectedColorId,
                    },
                    success: function(response) {
                        if (response.status === 403) {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.warning(response.message).dismissOthers();
                        } else if (response.status === 402) {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.warning(response.message).dismissOthers();
                        } else if (response.status === 201) {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.warning(response.message).dismissOthers();
                        } else if (response.status === 202) {
                            alert(response.message);
                        } else if (response.status === 200) {
                            countCart();
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(response.message).dismissOthers();
                        }
                    }
                });
            });

            countCart();

            function countCart() {
                $.ajax({
                    url: "/cart/count",
                    type: "GET",
                    success: function(response) {
                        $("#countcart").text(response);
                    }
                })
            }

        });
        // exzoom
        $(function() {
            $("#exzoom").exzoom({
                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                // autoplay
                "autoPlay": true,
                // autoplay interval in milliseconds
                "autoPlayTimeout": 5000
            });
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
    </script>
@endsection

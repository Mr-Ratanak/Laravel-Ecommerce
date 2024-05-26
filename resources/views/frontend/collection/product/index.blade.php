@extends('layouts.app')
@section('title')
{{$category->meta_title}}
@endsection
@section('meta_keyword')
{{$category->meta_keyword}}
@endsection
@section('meta_description')
{{$category->meta_description}}
@endsection

@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Products</h4>
            </div>
            <div class="col-md-3">
                <form action="{{url('collection/'.$category->name.'/filter')}}" method="GET">
                    <div class="card">
                        <h4 id="brand" class="card-header fw-bolder">Brands <button type="submit" class="btn btn-primary float-end"><i class="bi bi-funnel"> Filter</i></button></h4>
                        <div class="card-body">
                            @foreach ($products as $item)
                            @php
                                $checked = [];
                                if(isset($_GET['filters'])){
                                    $checked = $_GET['filters'];
                                }
                            @endphp
                            <input type="checkbox" name="filters[]" value="{{$item->brand}}" id="brand" @if (in_array($item->brand,$checked))
                                checked
                            @endif> {{$item->brand}} <br>
                            @endforeach

                        </div>
                    </div>
                </form>
            </div>
            @forelse ($products as $productItem)
            <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-img">
                        @if ($productItem->quantity > 0)
                        <label class="stock bg-success">In Stock</label>
                        @else
                        <label class="stock bg-danger">Out Stock</label>
                        @endif

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
                    <div class="py-2 text-center">No products avialable in Stock</div>
                </div>
            @endforelse

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
                        countWishlist();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(response.message).dismissOthers();
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

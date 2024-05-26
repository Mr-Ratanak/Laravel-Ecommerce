@extends('layouts.app')
@section('title','All Category')

@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Categories</h4>
            </div>
            @forelse ($categories as $item)
            <div class="col-6 col-md-3">
                <div class="category-card">
                    <a href="{{url('collection/'.$item->slug.'')}}">
                        <div class="category-card-img">
                            <img src="{{asset('uploaded/category/'.$item->image.'')}}" class="w-100" alt="Laptop">
                        </div>
                        <div class="category-card-body">
                            <h5>{{$item->name}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @empty
                <h3 class="text-center">No category found!!!</h3>
            @endforelse
           
           
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
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
    </script>
@endsection
@extends('layouts.app')
@section('title','All Category')

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
           
                            @foreach ($products as $branditem)
                            <input type="checkbox" name="filters" value="{{$branditem->brand}}"> {{$branditem->brand}}
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
                           <a href="">
                                {{$productItem->name}}
                           </a>
                        </h5>
                        <div>
                            <span class="selling-price">${{$productItem->selling_price}}</span>
                            <span class="original-price">${{$productItem->original_price}}</span>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1">Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                            <a href="" class="btn btn1"> View </a>
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
@extends('layouts.admin')
@section('css')
    <style>
        .head-cat{
            display: flex;
            justify-content: space-between;
        }
    </style>
@endsection
@section('content')


<div class="container-fluid">
    @component('components.alerts')
        
    @endcomponent
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h5 class="d-flex pt-2 justify-content-between"><span class="pt-2">Product List</span>
                         <a href="{{url('admin/products/create')}}" class="btn btn-primary float-end" >Add Product</a>
                     </h5>
                 </div>
                 <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category_ID</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>
                                            @if ($product->category)
                                            {{$product->category->name}}     
                                            @else
                                            No Category found!!!
                                            @endif
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->original_price}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td class="{{$product->status == '1'?'text-danger':'text-primary'}}">{{$product->status == '1'?'Hidden':'Visible'}}</td>
                                        <td class="color-primary">
                                            <a href="{{url('admin/products/'.$product->id.'/delete')}}" class="text-success " onclick="return(confirm('Are you sure, to delete this !!!'))"><i class="ti-trash"></i></a>
                                            <a href="{{url('admin/products/'.$product->id.'/edit')}}" class="text-primary px-2"><i class="ti-pencil"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center my-2">
                            {!!$products->links()!!}
                        </div>
                    </div>
                 </div>
             </div>
         </div>
     </div>
     
 </div>

 
@endsection
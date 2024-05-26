@extends('layouts.admin')
@section('css')
    <style>
        .head-cat{
            display: flex;
            justify-content: space-between;
            padding-top: .30rem;
        }
    </style>
@endsection
@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors as $error)
                <div class="">{{$error}}</div>
            @endforeach
        </div>
    @endif
    <div class="row mt-4">
        <div class="col-12">
          <div class="card">
              <div class="card-header">
                    <h5 class="fw-bold head-cat align-items-center">Edit Products
                    <a href="{{url('admin/products')}}" class="btn btn-warning rounded-0">Go back</a>
                  </h5>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="ceo-tab" data-bs-toggle="tab" data-bs-target="#ceo-tab-pane" type="button" role="tab" aria-controls="ceo-tab-pane" aria-selected="false">Ceo Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="false">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pro-image-tab" data-bs-toggle="tab" data-bs-target="#pro-image-tab-pane" type="button" role="tab" aria-controls="pro-image-tab-pane" aria-selected="false" >Product Image</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false" >Product Color</button>
                        </li>
                      </ul>
                      <form action="{{url('admin/products/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="form-group">
                                    <label for="category_tbl_id ">Select Category <span class="text-danger">*</span></label>
                                    <select name="category_tbl_id" class="form-control" id="category_tbl_id">
                                        <option value="" disabled>--SELECT--</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $products->category_tbl_id ? 'selected':''}} >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_tbl_id')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" value="{{$products->name}}" name="name" id="name" class="form-control" placeholder="product name">
                                    @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug">Product slug <span class="text-danger">*</span></label>
                                    <input type="text" value="{{$products->slug}}" name="slug" id="slug" class="form-control" placeholder="product slug">
                                    @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand">Select Brand</label>
                                    <select name="brand" id="brand"  class="form-control" >
                                        <option value="" disabled>--SELECT--</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{$brand->name}}" {{$brand->name == $products->brand ? 'selected':''}}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="small_description">Small description (500 word)</label>
                                    <textarea name="small_description" id="small_description" class="form-control" cols="2" rows="4" placeholder="Samll descrition ...">{{$products->small_description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description (500 word)</label>
                                    <textarea name="description" id="description" class="form-control" cols="2" rows="4" placeholder="Descrition ...">{{$products->description}}</textarea>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="ceo-tab-pane" role="tabpanel" aria-labelledby="ceo-tab" tabindex="0">
                                <div class="form-group">
                                    <label for="meta_title">Meta title</label>
                                    <textarea name="meta_title" id="meta_title" class="form-control" cols="4" rows="4" placeholder="Meta Title here ...">{{$products->meta_title}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta description</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control" cols="4" rows="4" placeholder="Meta description here ...">{{$products->meta_description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta keyword</label>
                                    <textarea name="meta_keyword" id="meta_keyword" class="form-control" cols="4" rows="4" placeholder="Meta keyword here ...">{{$products->meta_keyword}}</textarea>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-4"><label for="original_price">Original Price <span class="text-danger">*</span></label></div>
                                            <div class="col-8"><input type="text" value="{{$products->original_price}}" name="original_price" id="original_price" class="form-control" placeholder="Original price">
                                                @error('original_price')<small class="text-danger">{{$message}}</small>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-4"><label for="selling_price">Selling Price <span class="text-danger">*</span></label></div>
                                            <div class="col-8"><input type="text" value="{{$products->selling_price}}" name="selling_price" id="selling_price" class="form-control" placeholder="Selling price">
                                                @error('selling_price')<small class="text-danger">{{$message}}</small>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-4"><label for="quantity">Original Price <span class="text-danger">*</span></label></div>
                                            <div class="col-8"><input type="number" value="{{$products->quantity}}" name="quantity" id="quantity" class="form-control" placeholder="Quantity">
                                                @error('quantity')<small class="text-danger">{{$message}}</small>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-4"><label for="status">Status</label></div>
                                            <div class="col-8"><input type="checkbox" {{$products->status == '1' ? 'checked':''}} name="status" id="status"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-4"><label for="trending">Trending</label></div>
                                            <div class="col-8"><input type="checkbox" {{$products->trending == '1' ? 'checked':''}} name="trending" id="trending"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-4"><label for="featured">Featured</label></div>
                                            <div class="col-8"><input type="checkbox" {{$products->featured == '1' ? 'checked':''}} name="featured" id="featured"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="pro-image-tab-pane" role="tabpanel" aria-labelledby="pro-image-tab" tabindex="0">
                                <div class="form-group">
                                    <label for="images">Product Image</label>
                                    <input type="file" name="images[]" multiple id="images" class="form-control">
                                </div>
                                @if ($products->productImages)
                                   <div class="row">
                                    @foreach ($products->productImages as $image)
                                    <div class="col-sm-2" style="display: flex; flex-direction: column;">
                                        <img src="{{asset('uploaded/products/'.$image->images)}}" class="me-4 border" style="width: 80px; height: 80px;" alt="">
                                        <a href="{{url('admin/products-images/'.$image->id.'/delete')}}" class="text-danger px-4"><i class="ti-trash"></i></a>
                                    </div>
                                @endforeach
                                   </div>
                                @else
                                <h5 class="text-center my-2">No Image Found!!</h5>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                <div class="form-group">
                                    <h6>Select colors : </h6>
                                    <div class="row my-2" >
                                        @forelse ($colors as $colorItem)
                                            <div class="col-md-2 shadow-sm">
                                                <input type="checkbox"  name="colors[{{$colorItem->id}}]" value="{{$colorItem->id}}"> {{$colorItem->name}} <br>
                                                Quantity: <input type="number" name="colorquantity[{{$colorItem->id}}]" style="width: 100px;" >
                                            </div>
                                            @empty
                                                <div class="text-center mx-auto">
                                                    <p class="text-bold text-primary">No color found!</p>
                                                </div>
                                        @endforelse
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <table class="table table-responsive align-middle table-borderless text-center">
                                        <thead>
                                            <tr>
                                            <th>Color ID</th>
                                            <th>Color Name</th>
                                            <th>Quantity</th>
                                            <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($products->productColors as $fetch_color)
                                           <tr class="pro-color-tr">
                                            <td>{{$fetch_color->colors_id}}</td>
                                            @if ($fetch_color->color)
                                            <td>{{$fetch_color->color->name}}</td>
                                            @else
                                            <p class="text-center mx-auto">No Color Found!</p>
                                            @endif
                                            <td>
                                                <div class="form-group d-flex">
                                                    <input type="text" class="updateProductQty form-control" value="{{$fetch_color->quantity}}" name="edit_pro_color">
                                                    <input type="button" id="{{$fetch_color->id}}" class="updateProColorBtn btn-primary" value="Update" style="cursor: pointer;">
                                                </div>
                                            </td>
                                            <td><input type="button" id="{{$fetch_color->id}}" class="deleteProColorBtn btn-danger" value="Delete" style="cursor: pointer;"></td>
                                        </tr>
                                           @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary rounded-0 mt-2">Update</button>
                        </div>
                    </form>
                </div>
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

            $(document).on('click','.updateProColorBtn',function(){
                var product_id = "{{$products->id}}";
                var product_qty = $(this).closest('.pro-color-tr').find('.updateProductQty').val();
                var pro_color_id = $(this).attr('id');
                // alert(product_qty);

                if(product_qty <= 0){
                    alert('Quantity must be required!');
                    return false;
                }
                var data = {
                    'product_id': product_id,
                    'qty': product_qty,
                }
                $.ajax({
                    url: "/admin/products-color/"+pro_color_id,
                    type: "POST",
                    data: data,
                    success: function(response){
                        alert(response.message);
                    }
                })

            });
            $(document).on('click','.deleteProColorBtn',function(){
                var get_del_id = $(this).attr('id');
                var thisClick = $(this);

                $.ajax({
                    url: "/admin/products-color/"+get_del_id+"/delete",
                    type: "GET",
                    success: function(response){
                        thisClick.closest('.pro-color-tr').remove();
                        alert(response.message);
                    }
                })
            });

        });
    </script>
@endsection

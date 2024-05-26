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
    @component('../components.alerts')
    @endcomponent
    <div class="row mt-4">
        <div class="col-12">
          <div class="card">
              <div class="card-header">
                    <h5 class="fw-bold head-cat align-items-center">Add Products
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
                      <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="form-group">
                                    <label for="category_tbl_id ">Select Category <span class="text-danger">*</span></label>
                                    <select name="category_tbl_id" class="form-control" id="category_tbl_id">
                                        <option value="" selected disabled>--SELECT--</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_tbl_id')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="product name">
                                    @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug">Product slug <span class="text-danger">*</span></label>
                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="product slug here...">
                                    @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand">Select Brand</label>
                                    <select name="brand" id="brand"  class="form-control" >
                                        <option value="" selected disabled>--SELECT--</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{$brand->name}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="small_description">Small description (500 word)</label>
                                    <textarea name="small_description" id="small_description" class="form-control" cols="2" rows="4" placeholder="Samll descrition ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description (500 word)</label>
                                    <textarea name="description" id="description" class="form-control" cols="2" rows="4" placeholder="Descrition ..."></textarea>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="ceo-tab-pane" role="tabpanel" aria-labelledby="ceo-tab" tabindex="0">
                                <div class="form-group">
                                    <label for="meta_title">Meta title</label>
                                    <textarea name="meta_title" id="meta_title" class="form-control" cols="4" rows="4" placeholder="Meta Title here ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta description</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control" cols="4" rows="4" placeholder="Meta description here ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta keyword</label>
                                    <textarea name="meta_keyword" id="meta_keyword" class="form-control" cols="4" rows="4" placeholder="Meta keyword here ..."></textarea>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-4"><label for="original_price">Original Price <span class="text-danger">*</span></label></div>
                                            <div class="col-8"><input type="number" name="original_price" id="original_price" class="form-control" placeholder="Original price">
                                                @error('original_price')<small class="text-danger">{{$message}}</small>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-4"><label for="selling_price">Selling Price <span class="text-danger">*</span></label></div>
                                            <div class="col-8"><input type="number" name="selling_price" id="selling_price" class="form-control" placeholder="Selling price">
                                                @error('selling_price')<small class="text-danger">{{$message}}</small>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-4"><label for="quantity">Quantity <span class="text-danger">*</span></label></div>
                                            <div class="col-8"><input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity">
                                                @error('quantity')<small class="text-danger">{{$message}}</small>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-4"><label for="status">Status</label></div>
                                            <div class="col-8"><input type="checkbox" name="status" id="status"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-4"><label for="trending">Trending</label></div>
                                            <div class="col-8"><input type="checkbox" name="trending" id="trending"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="col-4"><label for="trending">Featured</label></div>
                                            <div class="col-8"><input type="checkbox" name="featured" id="featured"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="pro-image-tab-pane" role="tabpanel" aria-labelledby="pro-image-tab" tabindex="0">
                                <div class="form-group">
                                    <label for="images">Product Image</label>
                                    <small class="text-info">upload with multiple</small>
                                    <input type="file" name="images[]" multiple id="images" class="form-control">
                                </div>

                            </div>
                            <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                <div class="form-group">
                                    <h6>Select colors : </h6>
                                    <div class="row my-2" >
                                        @foreach ($colors as $colorItem)
                                            <div class="col-md-2 shadow-sm">
                                                <input type="checkbox"  name="colors[{{$colorItem->id}}]" id="color" value="{{$colorItem->id}}" > {{$colorItem->name}} <br>
                                                Quantity: <input type="number"  name="colorquantity[{{$colorItem->id}}]" value="0" style="width: 100px;" >
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary rounded-0">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>

    </div>





</div>
@endsection

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
    
    <div class="row mt-4">
        <div class="col-12">
          <div class="card">
              <div class="card-header">
                    <h5 class="fw-bold head-cat align-items-center">Add Brand
                    <a href="{{url('admin/brands')}}" class="btn btn-primary rounded-0">Go back</a>
                  </h5>
              </div>
              <div class="row">
                <div class="col-lg-12">
                        <div class="card-body">
                            <form action="{{url('admin/brands/store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-3">Select category name</div>
                                    <div class="col-9"><select name="category_id" id="category_id" class="form-control">
                                        <option value="" selected>--SELECT--</option>
                                        @foreach ($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-3">Brand Name</div>
                                    <div class="col-9"><input type="text" name="name" class="form-control">
                                    @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-3">Brand Slug</div>
                                    <div class="col-9"><input type="text" name="slug" class="form-control">
                                    @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                </div>
                                
                                <div class="row mt-2">
                                    <div class="col-3">Status</div>
                                    <div class="col-9"><input type="checkbox" name="status" class="form-checkbox"> &nbsp; &nbsp; <small>Checked=Hidden, Un,Check=Visible</small></div>
                                </div>
                                <div class="modal-footer mt-2">
                                    <button type="submit" class="btn btn-success">Save</button>
                                  </div>
                               
                               </form>
                        </div>
                </div>
            </div>
          </div>
        </div>
          
    </div>
   

   
    

</div>
@endsection

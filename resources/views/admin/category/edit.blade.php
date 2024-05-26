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
                    <h5 class="fw-bold head-cat align-items-center">Edit Category
                    <a href="{{url('admin/category')}}" class="btn btn-primary rounded-0">Go back</a>
                  </h5>
              </div>
              <div class="row">
                <div class="col-lg-12">
                        <div class="card-body">
                            <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row my-0">
                                    <div class="col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{$category->name}}">
                                        @error('name')
                                            <small><div class="text-danger">{{$message}}</div></small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control" value="{{$category->slug}}">
                                        @error('slug')
                                        <small><div class="text-danger">{{$message}}</div></small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row my-0">
                                    <div class="col-md-12">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" cols="4" rows="4">{{$category->description}}</textarea>
                                        @error('description')
                                        <small><div class="text-danger">{{$message}}</div></small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row my-0">
                                    <div class="col-md-6">                                    
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control" placeholder="image">
                                        <img src="{{asset('/uploaded/category/'.$category->image.'')}}" width="100" height="100" alt="">
                                        @error('image')
                                        <small><div class="text-danger">{{$message}}</div></small>
                                    @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status">Status</label>
                                        <input type="checkbox" name="status" id="status" class="form-check" {{$category->status == '1'?'checked':''}}>
                                        @error('status')
                                        <small><div class="text-danger">{{$message}}</div></small>
                                    @enderror
                                    </div>
                                </div>
                                <h6 class="row col-md-6 py-2 text-shadow fw-bold my-0">CEO Tags</h6>
                                <div class="form-group row my-0">
                                    <div class="col-md-6">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" value="{{$category->meta_title}}">
                                        @error('meta_title')
                                        <small><div class="text-danger">{{$message}}</div></small>
                                    @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="meta_key">Meta Key</label>
                                        <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" placeholder="Meta Keyword" value="{{$category->meta_keyword}}">
                                        @error('meta_keyword')
                                        <small><div class="text-danger">{{$message}}</div></small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row my-0">
                                    <div class="col-md-12">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" class="form-control" cols="4" rows="4">{{$category->meta_description}}</textarea>
                                        @error('meta_description')
                                        <small><div class="text-danger">{{$message}}</div></small>
                                    @enderror
                                    </div>
                                </div>
                                
                                    <div class="row mt-2 justify-content-end">
                                       <button type="submit" class="btn btn-primary float-end">Update</button>
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

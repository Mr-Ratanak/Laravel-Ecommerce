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
                    <h5 class="fw-bold head-cat align-items-center">Add Category
                    <a href="{{url('admin/category')}}" class="btn btn-primary rounded-0">Go back</a>
                  </h5>
              </div>
              <div class="row">
                <div class="col-lg-12">
                        <div class="card-body">
                            <form action="{{url('admin/category')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-4">Name <small class="text-danger">*</small></div>
                                    <div class="col-8">
                                        <input type="text" name="name" class="form-control">
                                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4">Slug <small class="text-danger">*</small></div>
                                    <div class="col-8"><input type="text" name="slug" class="form-control">
                                    @error('slug')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4">Description <small class="text-danger">*</small></div>
                                    <div class="col-8"> <textarea name="description" id="description" class="form-control" cols="4" rows="4"></textarea>
                                    @error('description')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4">Image <small class="text-danger">*</small></div>
                                    <div class="col-8"><input type="file" name="image" class="form-control">
                                    @error('image')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4">Meta Title <small class="text-danger">*</small></div>
                                    <div class="col-8"> <textarea name="meta_title" id="description" class="form-control" cols="4" rows="4"></textarea>
                                    @error('meta_title')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                </div> 

                                <div class="row my-2">
                                    <div class="col-4">Meta Keyword <small class="text-danger">*</small></div>
                                    <div class="col-8"> <textarea name="meta_keyword" id="description" class="form-control" cols="4" rows="4"></textarea>
                                    @error('meta_keyword')<small class="text-danger">{{$message}}</small>@enderror
                                </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4">Meta Description <small class="text-danger">*</small></div>
                                    <div class="col-8"> <textarea name="meta_description" id="description" class="form-control" cols="4" rows="4"></textarea>
                                    @error('meta_description')<small class="text-danger">{{$message}}</small>@enderror
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

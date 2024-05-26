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
    @component('components.alerts')
        
    @endcomponent
    <div class="row mt-4">
        <div class="col-12">
          <div class="card">
              <div class="card-header">
                    <h5 class="fw-bold head-cat align-items-center">Edit Slide
                    <a href="{{url('admin/slides')}}" class="btn btn-primary rounded-0">Go back</a>
                  </h5>
              </div>
              <div class="row">
                <div class="col-lg-12">
                        <div class="card-body">
                            <form action="{{url('admin/slides/'.$slide->id)}}" method="POST" enctype="multipart/form-data">                           
                                {{ csrf_field() }}
                                @method('PUT')

                                <div class="row">
                                    <label id="title" class="col-4">Title</label>
                                    <div class="col-8"><input type="text" name="title" class="form-control" placeholder="title" value="{{$slide->title}}">
                                    @error('title')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label id="description" class="col-4">Description</label>
                                    <div class="col-8"><textarea name="description" id="description" class="form-control" cols="30" rows="10" style="height: 150px;">{{$slide->description}}</textarea></div>
                                    @error('description')<small class="text-danger">{{$message}}</small>@enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label id="description" class="col-4">Slide Image</label>
                                    <div class="col-8"><input type="file" name="image" class="form-control">
                                    </div>
                                    <img src="{{asset('uploaded/slides/'.$slide->image)}}" style="height: 100px; width: 100px; " class="my-2 img-thumbnail" alt="{{$slide->image}}">
                                </div>

                                <div class="row mt-2">
                                    <label id="status" class="col-4">Status</label>
                                    <div class="col-8"><input type="checkbox" id="status" {{$slide->status == '1' ?'checked':''}} name="status">
                                        <small class="text-info">hidden or visible</small>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2"><button type="submit" class="btn btn-success float-end">Upload Slide</button></div>
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

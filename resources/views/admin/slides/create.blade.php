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
                    <h5 class="fw-bold head-cat align-items-center">Add Slide
                    <a href="{{url('admin/slides')}}" class="btn btn-warning rounded-0">Go back</a>
                  </h5>
              </div>
              <div class="row">
                <div class="col-md-12">
                      <form action="{{url('admin/slides')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <label id="title" class="col-4">Title</label>
                            <div class="col-8"><input type="text" name="title" class="form-control" placeholder="title">
                            @error('title')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label id="description" class="col-4">Description</label>
                            <div class="col-8"><textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Description here....."  style="height: 100px; "></textarea></div>
                            @error('description')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="row mt-2">
                            <label id="description" class="col-4">Slide Image</label>
                            <div class="col-8"><input type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label id="status" class="col-4">Status</label>
                            <div class="col-8"><input type="checkbox" id="status" name="status">
                                <small class="text-info">hidden or visible</small>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2"><button type="submit" class="btn btn-success float-end">Update Slide</button></div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
          
    </div>
   

   
    

</div>
@endsection

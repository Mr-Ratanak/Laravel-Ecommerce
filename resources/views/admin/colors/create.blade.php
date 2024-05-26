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
                    <h5 class="fw-bold head-cat align-items-center">Add Colors
                    <a href="{{url('admin/colors')}}" class="btn btn-warning rounded-0">Go back</a>
                  </h5>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <form action="{{url('admin/colors')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-3">Color Name</div>
                                <div class="col-9"><input type="text" name="name" class="form-control">
                                @error('name')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-3">Color Code</div>
                                <div class="col-9"><input type="text" name="code" class="form-control">
                                @error('code')<small class="text-danger">{{$message}}</small>@enderror
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

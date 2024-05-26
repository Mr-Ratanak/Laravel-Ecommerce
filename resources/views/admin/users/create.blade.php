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
                    <h5 class="fw-bold head-cat align-items-center">Add User
                    <a href="{{url('admin/user')}}" class="btn btn-warning rounded-0">Go back</a>
                  </h5>
              </div>
              <div class="card-body">
                <form action="{{url('admin/user/store')}}" method="POST" class="mt-3">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">User Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="user name" value="{{old('name')}}">
                                @error('name')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{old('email')}}">
                                @error('email')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password <span class="text-danger">* <small class="text-success">password should contain Capital latter,digits,number,symbols</small></span></label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                @error('password')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Role <span class="text-danger">*</span></label>
                                <select name="role_as" id="role" class="form-control">
                                    <option value="">--SELECT OPTION--</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Cashier</option>
                                </select>
                                @error('role_as')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                    </div>
                   
                    <div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary float-end">Save User</button></div>

                </form>
              </div>
              
          </div>
        </div>
          
    </div>
   

   
    

</div>
@endsection

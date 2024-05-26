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
                    <h5 class="fw-bold head-cat align-items-center">Edit User
                    <a href="{{url('admin/user')}}" class="btn btn-warning rounded-0">Go back</a>
                  </h5>
              </div>
              <div class="card-body">
                <form action="{{url('admin/user/'.$user->id.'/update')}}" method="POST" class="mt-3">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">User Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="user name" value="{{$user->name}}">
                                @error('name')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password <span class="text-danger">* </span></label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                @error('password')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail <span class="text-danger">*</span></label>
                                <input type="email" readonly name="email" id="email" class="form-control" placeholder="email" value="{{$user->email}}">
                                @error('email')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" id="confirm_password" class="form-control" placeholder="confirm password">
                                @error('password_confirmation')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Role <span class="text-danger">*</span></label>
                                <select name="role_as" id="role" class="form-control">
                                    <option value="">--SELECT OPTION--</option>
                                    <option value="0" {{$user->role_as == '0'?'selected':''}}>User</option>
                                    <option value="1" {{$user->role_as == '1'?'selected':''}}>Admin</option>
                                    <option value="2" {{$user->role_as == '2'?'selected':''}}>Cashier</option>
                                </select>
                                @error('role_as')<small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                    </div>
                   
                    <div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary float-end">Update User</button></div>

                </form>
              </div>
              
          </div>
        </div>
          
    </div>
   

   
    

</div>
@endsection

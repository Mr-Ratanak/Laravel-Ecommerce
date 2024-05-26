@extends('layouts.admin')
@section('css')
    <style>
        .head-cat{
            display: flex;
            justify-content: space-between;
        }
    </style>
@endsection
@section('content')

<div class="container-fluid">
    @component('components.alerts')
    @endcomponent
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h5 class="d-flex pt-2 justify-content-between"><span class="pt-2">Users List</span>
                         <a href="{{url('admin/user/create')}}" class="btn btn-primary float-end" >Add User</a>
                     </h5>
                 </div>
                 <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Role</th>
                                    <th>E-Mail</th>                        
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            @if ($user->role_as == '0')
                                            <label for="" class="badge badge-success">User</label> 
                                            @elseif($user->role_as == '1')
                                            <label for="" class="badge badge-primary">Admin</label>
                                            @elseif($user->role_as == '2')
                                            <label for="" class="badge badge-warning">Cashier</label>
                                            @else
                                            No User or Admin found!!!
                                            @endif
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td class="color-primary">
                                            <a href="{{url('admin/user/'.$user->id.'/delete')}}" class="text-success " onclick="return(confirm('Are you sure, to delete this !!!'))"><i class="ti-trash"></i></a>
                                            <a href="{{url('admin/user/'.$user->id.'/edit')}}" class="text-primary px-2"><i class="ti-pencil"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center my-2">
                            {!!$users->links()!!}
                        </div>
                    </div>
                 </div>
             </div>
         </div>
     </div>
     
 </div>

@endsection
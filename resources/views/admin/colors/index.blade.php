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
                     <h5 class="d-flex pt-2 justify-content-between"><span class="pt-2">Colors List</span>
                         <a href="{{url('admin/colors/create')}}" class="btn btn-primary float-end" >Add Color</a>
                     </h5>
                 </div>
                 <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Color name</th>
                                    <th>Color code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $color)
                                    <tr>
                                        <td>{{$color->id}}</td>
                                        <td>{{$color->name}}</td>
                                        <td>{{$color->code}}</td>

                                        <td class="{{$color->status == '1'?'text-danger':'text-primary'}}">{{$color->status == '1'?'Hidden':'Visible'}}</td>
                                        <td class="color-primary">
                                            <a href="{{url('admin/colors/'.$color->id.'/delete')}}" class="text-success " onclick="return(confirm('Are you sure, to delete this !!!'))"><i class="ti-trash"></i></a>
                                            <a href="{{url('admin/colors/'.$color->id.'/edit')}}" class="text-primary px-2"><i class="ti-pencil"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center my-2">
                            {!!$colors->links()!!}
                        </div>
                    </div>
                 </div>
             </div>
         </div>
     </div>
     
 </div>

 
@endsection
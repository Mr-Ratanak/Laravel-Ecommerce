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
                     <h5 class="d-flex pt-2 justify-content-between"><span class="pt-2">Slides List</span>
                         <a href="{{url('admin/slides/create')}}" class="btn btn-primary float-end" >Add Slide</a>
                     </h5>
                 </div>
                 <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($slides->count() > 0)
                                @foreach ($slides as $slide)
                                    <tr>
                                        <td>00{{$slide->id}}</td>
                                        <td>{{$slide->title}}</td>
                                        <td class="w-50">{{substr($slide->description,0,100)}}...</td>
                                        <td><img class="img-thumbnail" style="width: 50px; height: 50px; border-radius: 50%;" src="{{asset('uploaded/slides/'.$slide->image.'')}}" alt=""></td>
                                        <td class="{{$slide->status == '1'?'text-warning':'text-info'}}">{{$slide->status == '1'?'Hidden':'Visible'}}</td>
                                        <td class="color-primary">
                                            <a href="{{url('admin/slides/'.$slide->id.'/delete')}}" class="text-success " onclick="return(confirm('Are you sure, to delete this !!!'))"><i class="ti-trash"></i></a>
                                            <a href="{{url('admin/slides/'.$slide->id.'/edit')}}" class="text-primary px-2"><i class="ti-pencil"></i></a>
                                        </td>
                                    </tr>
                                @endforeach      
                                @else
                                <h5 class="text-center my-2"></h5>
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center my-2">
                            {!!$slides->links()!!}
                        </div>
                    </div>
                 </div>
             </div>
         </div>
     </div>
     
 </div>

 
@endsection
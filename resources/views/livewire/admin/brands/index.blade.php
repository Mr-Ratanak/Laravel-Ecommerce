{{-- 

<div class="container">
   @component('components.alerts')
       
   @endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="d-flex pt-2 justify-content-between"><span class="pt-2">Brands List</span>
                        <a href="{{url('admin/brands/create')}}" class="btn btn-primary float-end" >Add Brand</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{$brand->id}}</td>
                                        <td>{{$brand->name}}</td>
                                        <td>{{$brand->slug}}</td>
                                        <td class="{{$brand->status == '1'?'text-danger':'text-primary'}}">{{$brand->status == '1'?'Hidden':'Visible'}}</td>
                                        <td>
                                            @if ($brand->category) 
                                                {{$brand->category->name}}
                                            @else
                                            <div class="text-center">No Category</div>
                                            @endif
                                        </td>
                                        <td class="color-primary">
                                            <a href="{{url('admin/brands/'.$brand->id.'/delete')}}" class="text-success " onclick="return(confirm('Are you sure, to delete this !!!'))"><i class="ti-trash"></i></a>
                                            <a href="{{url('admin/brands/'.$brand->id.'/edit')}}" class="text-primary px-2"><i class="ti-pencil"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center my-2">
                            {!!$brands->links()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
{{-- @push('script')
<script>
  window.addEventListener('close-modal',event=>{
      $('#addBrandModal').modal('hide');
  });
</script>
@endpush --}} --}}

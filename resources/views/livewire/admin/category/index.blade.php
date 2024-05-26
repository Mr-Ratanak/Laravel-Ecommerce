
 @component('components.alerts')
       
   @endcomponent
   <div class="row mt-4">
        <div class="col-12">
          <div class="card">
              <div class="card-header">
                      <h5 class="fw-bold pt-2 head-cat">Category
                      <a href="{{url('admin/category/create')}}" class="btn btn-primary rounded-0 float-end">Add Category</a>
                  </h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $row)
                            <tr>
                                <th scope="row">{{$row->id}}</th>
                                <td>{{$row->name}}</td>
                                <td><span class="{{$row->status == '1'?'badge badge-primary':'badge badge-warning'}}">{{$row->status == '1'?'Hidden':'Visible'}}</span></td>
                                <td>{{$row->description}}</td>
                                <td class="color-primary">
                                    <a href="{{url('admin/category/'.$row->id.'/delete')}}" class="text-success " onclick="return(confirm('Are you sure, to delete this !!!'))"><i class="ti-trash"></i></a>
                                    <a href="{{url('admin/category/'.$row->id.'/edit')}}" class="text-primary px-2"><i class="ti-pencil"></i></a>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    <div class="">
                        {{$categories->links()}}
                    </div>
                </div>
              </div>
          </div>
        </div>
          
      </div>
  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="delModal" tabindex="-1" aria-labelledby="delModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-4" id="delModal">Delete Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <form wire:submit.prevent="destroyCategory">
            <div class="modal-body">
                <h5>Are you sure, You want to delete this !!!</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Yes! Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- @push('script')
      <script>
        window.addEventListener('close-modal',event=>{
            $('#delModal').modal('hide');
        });
      </script>
  @endpush --}}

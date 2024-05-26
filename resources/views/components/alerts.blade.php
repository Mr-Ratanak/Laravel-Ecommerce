@if (session('message'))
<div class="alert alert-primary" role="alert">
    {{session('message')}}
  </div>
@endif
@if (session('success'))
<div class="alert alert-success" role="alert">
    {{session('success')}}
  </div>
@endif
@if (session('error'))
<div class="alert alert-warning" role="alert">
    {{session('error')}}
  </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger align-items-center" role="alert">
        <button type="button" class="btn close fs-3 float-end" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $errors)
        <ul>
            <li>{{$errors}}</li>
        </ul>
    @endforeach
    </div>
@endif


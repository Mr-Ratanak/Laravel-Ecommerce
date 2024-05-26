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
<div class="container">

   <div class="">
        <livewire:admin.category.index/>
   </div>
    

</div>
@endsection

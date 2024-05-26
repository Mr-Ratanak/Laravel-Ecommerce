@extends('layouts.app')
@section('title','Profile')

@section('content')

<div class="py-0 bg-light">
    <div class="container">
        @component('components.alerts')
        @endcomponent
        <div class="row">
            <div class="col-md-12">
                <div class="welcome-page" style="width: 80%; margin: 0 auto;">
                    <div class="trending">
                        <h3>User Profile <div class="underline"></div>
                            <a href="{{url('change-password')}}" class="btn btn-warning float-end text-white rounded-0">Update Password !</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center" style="width: 80%; margin: 0 auto;">
            <div class="card shadow m-4">
                <h4 class="card-header bg-primary text-white">User Details</h4>
                <div class="card-body">
                    <form action="{{url('profile/store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="fw-bold">Username</label>
                                    <input type="text" name="username" class="border-2 form-control" value="{{Auth::user()->name}}" placeholder="Username">
                                    @error('username')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="fw-bold">Phone</label>
                                    <input type="tel" name="phone" class="border-2 form-control" value="{{Auth::user()->userDetail->phone ?? ''}}" placeholder="Phone">
                                    @error('phone')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="" class="fw-bold">E-Mail</label>
                                    <input type="email" disabled name="email" class="border-2 form-control" value="{{Auth::user()->email ?? ''}}" placeholder="E-Mail">
                                    @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="form-group">
                                    <label for="" class="fw-bold">Flat-No</label>
                                    <input type="text" name="flat_no" class="border-2 form-control" value="{{Auth::user()->userDetail->flat_no ?? ''}}" placeholder="Flat eg. Street 504">
                                    @error('flate_no')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="address" class="fw-bold">Address</label>
                                    <textarea name="address" id="address" cols="10" rows="5" class="border-2 form-control" placeholder="Address here...">{{Auth::user()->userDetail->address ?? ''}}</textarea>
                                    @error('address')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary mt-3 rounded-0 d-inline-block">Save Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

           countWishlist();
           function countWishlist(){
            $.ajax({
                url: "/wishlist/count",
                type: "GET",
                success: function(response) {
                    $("#count").text(response);
                }
            })
           }

           countCart();
           function countCart(){
            $.ajax({
                url: "/cart/count",
                type: "GET",
                success: function(response) {
                    $("#countcart").text(response);
                }
            })
           }
        });
    </script>
@endsection

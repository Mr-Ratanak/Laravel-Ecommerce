@extends('layouts.app')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

            @component('components.alerts')
            @endcomponent

                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">Change Password
                            <a href="{{url('profile')}}" class="btn-sm btn btn-danger float-end"><i class="fa fa-arrow-left"></i> Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('change-password') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Current Password</label>
                                <input type="password" name="current_password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>New Password</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>
                            <div class="mb-3 text-end">
                                <hr>
                                <button type="submit" class="btn btn-primary">Update Password</button>
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

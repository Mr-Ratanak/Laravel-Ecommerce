@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Hello, <span>@if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif Welcome to dashboard</span></h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
        <p class="px-4">Analitics total reports</p>
        <hr class="text-danger w-100 h-20 bg-danger">
        <!-- /# column -->
    <section id="main-content">
        <div class="row">
            <div class="col-md-3 col-lg-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                        </div>
                        <div class="stat-content dib">
                            <div class="stat-text">All User</div>
                            <div class="stat-digit">{{$allUser}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                        </div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Products</div>
                            <div class="stat-digit">{{$totalProduct}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Category</div>
                            <div class="stat-digit">{{$totalCategory}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-panel color-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Brand</div>
                            <div class="stat-digit">{{$totalBrand}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-notepad color-info border-info"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total User</div>
                            <div class="stat-digit">{{$totalUser}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-stats-up color-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Admin</div>
                            <div class="stat-digit">{{$totalAdmin}}</div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3 col-lg-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                        </div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Order</div>
                            <div class="stat-digit text-success">$ {{$totalOrder}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-pulse color-secondary border-secondary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Order/ Month</div>
                            <div class="stat-digit">{{$totalMonthOrder}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-shopping-cart-full color-dark border-dark"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Order/ Year</div>
                            <div class="stat-digit">{{$totalYearOrder}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-timer color-warning border-warning"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Order/ Today</div>
                            <div class="stat-digit">{{$totalTodayOrder}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-archive color-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Order Completed</div>
                            <div class="stat-digit">{{$countTotalCompleted}}</div>
                            <p class="text-success">$/ {{$completedTotalSum}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-4">
                <div class="card">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-agenda color-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Order Pending</div>
                            <div class="stat-digit">{{$countTotalPending}}</div>
                            <p class="text-success">$/ {{$pendingTotalSum}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
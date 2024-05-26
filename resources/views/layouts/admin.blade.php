<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

      <!-- Standard -->
      <link rel="shortcut icon" href="assets/images/favicon.png">
      <!-- Retina iPad Touch Icon-->
      <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
      <!-- Retina iPhone Touch Icon-->
      <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
      <!-- Standard iPad Touch Icon-->
      <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
      <!-- Standard iPhone Touch Icon-->
      <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

   <!-- Styles -->
   <link href="{{asset('admin/css/lib/select2/select2.min.css')}}" rel="stylesheet">
   <link href="{{asset('admin/css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
   <link href="{{asset('admin/css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
   <link href="{{asset('admin/css/lib/font-awesome.min.css')}}" rel="stylesheet">
   <link href="{{asset('admin/css/lib/themify-icons.css')}}" rel="stylesheet">
   <link href="{{asset('admin/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
   <link href="{{asset('admin/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
   <link href="{{asset('admin/css/lib/weather-icons.css')}}" rel="stylesheet" />
   <link href="{{asset('admin/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
   <link href="{{asset('admin/css/lib/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('admin/css/lib/helper.css')}}" rel="stylesheet">
   <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    @livewireStyles


@yield('css')
</head>
<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        @include('layouts.inc.admin.slidebar')
    </div>
    <div class="header">
        @include('layouts.inc.admin.navbar')
    </div>
    <div class="content-wrap">
        <div class="main">
            @yield('content')
        </div>
        
    </div>



     <!-- Scripts -->
     {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
     <!-- jquery vendor -->
    <script src="{{asset('admin/js/lib/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/lib/jquery.nanoscroller.min.js')}}"></script>
    <!-- nano scroller -->
    <script src="{{asset('admin/js/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/scripts.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <!-- bootstrap -->

    <script src="{{asset('admin/js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{asset('admin/js/lib/preloader/pace.min.js')}}"></script>
    <!-- sidebar -->

    <script src="{{asset('admin/js/lib/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('admin/js/lib/toastr/toastr.init.js')}}"></script>
    {{-- Toastr  --}}

    <script src="{{asset('admin/js/lib/calendar-2/moment.latest.min.js')}}"></script>
    <script src="{{asset('admin/js/lib/calendar-2/pignose.calendar.min.js')}}"></script>
    <script src="{{asset('admin/js/lib/calendar-2/pignose.init.js')}}"></script>


    <script src="{{asset('admin/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{asset('admin/js/lib/weather/weather-init.js')}}"></script>
    <script src="{{asset('admin/js/lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin/js/lib/circle-progress/circle-progress-init.js')}}"></script>
    <script src="{{asset('admin/js/lib/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('admin/js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('admin/js/lib/sparklinechart/sparkline.init.js')}}"></script>
    <script src="{{asset('admin/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('admin/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
    <!-- scripit init-->
    <script src="{{asset('admin/js/dashboard2.js')}}"></script>
    @yield('script')

     @livewireScripts
     {{-- @stack('script') --}}
     
</body>
</html>

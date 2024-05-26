<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keyword')">
    <meta name="author" content="Mr.Ratanak Coding">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- CSS  -->
    <link rel="stylesheet" href="{{asset('assets/summernote.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css_bootstrap.min.css')}}">

    <!-- CSS alertify-->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    {{-- Owl carousel  --}}
    <link rel="stylesheet" href="{{asset('assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owl.theme.default.min.css')}}">

    {{-- Exzoom  --}}
    <link href="{{asset('assets/exzoom/jquery.exzoom.css')}}" rel="stylesheet">

    {{-- Swiper slide  --}}
    <link rel="stylesheet" href="{{asset('assets/swiper/swiper-bundle.min.css')}}">

    {{-- Custom style  --}}
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    @livewireStyles


@yield('css')

</head>
<body>
    <div id="app">

        @include('layouts.inc.frontend.navbar')

        <main class="py-4">
            @yield('content')
        </main>

        @include('layouts.inc.frontend.footer')
    </div>


     <!-- Scripts -->
     @vite(['resources/sass/app.scss', 'resources/js/app.js'])
     <script src="{{asset('assets/jquery-3.5.1.min.js')}}"></script>
     <script src="{{asset('assets/js.jquery.min.js')}}"></script>
     <script src="{{asset('assets/dist_summernote.min.js')}}"></script>
     {{-- <script src="{{asset('assets/popper.min.js')}}"></script>
     <script src="{{asset('assets/js_bootstrap.min.js')}}"></script> --}}
     {{-- <script src="{{asset('assets/js_bootstrap.bundle.min.js')}}" ></script> --}}

     <!-- JavaScript alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    {{-- Owl carousel script  --}}
    <script src="{{asset('assets/owl.carousel.min.js')}}"></script>

    {{-- Exzoom script  --}}
    <script src="{{asset('assets/exzoom/jquery.exzoom.js')}}"></script>


    <!-- Swiper JS -->
    <script src="{{asset('assets/swiper/swiper-bundle.min.js')}}"></script>
    
     @livewireScripts
     @yield('script')
</body>
</html>

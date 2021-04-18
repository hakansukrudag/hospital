<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hospital') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ mix('js/app.js') }}" defer></script>--}}

<!--   <link href="{{ mix('css/custom.css') }}" rel="stylesheet">-->
    <!-- Styles -->
{{--    <link href="{{ mix('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" media="screen"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="screen"/>

    <script src="https://kit.fontawesome.com/451d91865c.js" crossorigin="anonymous"></script>

<!-- <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" media="screen"/>-->
	<link rel="stylesheet" href="{{ asset('css/fonts.css') }}" media="screen"/>
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" media="screen"/>
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}" media="screen"/>
	<link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}" media="screen"/>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen"/>
	<link rel="stylesheet" href="{{ asset('css/color/style_baby.css') }}" media="screen"/>
	<link rel="stylesheet" id="theme-color" type="text/css" href="#"/>
    @stack('css')
</head>
<body>
    <div id="app">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.bxslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.mixitup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/smoothscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/single-0.1.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    @stack('js')
</body>
</html>

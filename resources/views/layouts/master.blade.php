<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FoodCellent') }} - @yield('title')</title>
    <link rel="icon" type="image/jpg" sizes="256x256" href="{{ asset('favicon.ico') }}">

    {{--    BOOTSTRAP    --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">

    {{--    TAILWIND    --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{--    FONTAWESOME    --}}
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">

    {{--    SWIPER    --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    {{--    CUSTOM    --}}
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    {{--    JQUERY    --}}
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
</head>
<body>
<div id="particles-js"></div>

<div class="container shadow position-relative p-0">
    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')
</div>

<script src="{{ asset('js/particles/particles.js') }}"></script>

{{--    BOOTSTRAP    --}}
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

{{--    SWIPER    --}}
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

{{--    CUSTOM    --}}
<script src="{{ asset('js/index.js') }}"></script>

</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FoodCellent') }} - @yield('title')</title>
    <link rel="icon" type="image/jpg" sizes="256x256" href="{{ asset('favicon.ico') }}">

    @include('partials.links')

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

@include('partials.scripts')
</body>
</html>

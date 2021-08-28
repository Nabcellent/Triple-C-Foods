<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FoodCellent') }} - @yield('title')</title>
    <link rel="icon" type="image/jpg" sizes="256x256" href="{{ asset('logo.ico') }}">

    @include('partials.links')

    {{--    JQUERY    --}}
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
</head>
<body>
<div id="particles-js"></div>

<div class="container shadow position-relative p-0">
    @include('partials.navbar')

    @yield('content')

    <a href="#navigation-sticky" class="scroll-to-top" title="Scroll To Top"><i class="fas fa-arrow-circle-up"></i></a>

    @include('partials.footer')
</div>

@include('partials.scripts')
</body>
</html>

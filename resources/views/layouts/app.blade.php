<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Triple-C') }}</title>
    <link rel="icon" type="image/jpg" sizes="256x256" href="{{ asset('logo.ico') }}">

    @include('admin.partials.links')

    {{--    JQUERY    --}}
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
</head>
<body class="font-sans antialiased">
<div id="particles-js"></div>

<div class="max-w-7xl mx-auto min-h-screen bg-gray-100 shadow relative">
@include('layouts.navigation')

<!-- Page Heading -->
    <header class="bg-red-900">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
            {{ $header }}
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@include('partials.scripts')
</body>
</html>

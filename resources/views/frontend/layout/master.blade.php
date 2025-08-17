<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- css -->
    @vite(['resources/css/app.css', 'resources/css/frontend/index.css', 'resources/css/frontend/header.css', 'resources/css/frontend/footer.css'])

    @stack('css')

</head>

<body>

    @include('frontend.layout.body.header')


    @yield('content')

    @if (Request::segment(1) != 'register' && Request::segment(1) != 'login')
        @include('frontend.layout.body.footer')
    @endif

    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/js/frontend/index.js'])

    @stack('scripts')
</body>

</html>

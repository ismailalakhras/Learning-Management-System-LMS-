@php
    $categories = \App\Models\Category::latest('created_at')->get();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">



    <!-- css -->
    @vite(['resources/css/app.css', 'resources/css/backend/index.css'])

    @stack('css')

</head>

<body>

    @include('backend.layout.body.sidebar')
    @yield('content')

    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/js/backend/index.js'])

    @stack('scripts')

</body>

</html>

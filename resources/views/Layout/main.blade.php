<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-gray-200">
    @yield('content')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('sw2')
    @stack('js')
</body>

</html>

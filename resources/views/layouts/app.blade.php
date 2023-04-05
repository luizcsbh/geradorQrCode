<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gerador de qr-code web">
    <meta name="keywords" content="gerador,QR Code, url, Generator, laravel, php, web">
    <meta name="author" content="LC Station">
    <title>@yield('title', 'QR Code Generator')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    @include('layouts/footer')


    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

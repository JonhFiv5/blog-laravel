<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Blog | @yield('title') </title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        @yield('imports')
    </head>
    <body>
        @include('_partials._nav-bar')
        <div class="container">
            @yield('content')
        </div>
    </body>
    @yield('scripts')
</html>

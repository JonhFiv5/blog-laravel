<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Blog | @yield('title') </title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
        @yield('imports')
    </head>
    <body>
        @include('_partials._nav-bar')
        <div id="back-to-top">
            <a href="#general-navbar" class="btn btn-dark"><i class="fas fa-arrow-up"></i></a>
        </div>

        <div class="container">
            @yield('content')
        </div>
        @include('sweetalert::alert')
    </body>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        // Função que exibe ou oculta o botão de atalho para o top da página
        const backToTopDiv = document.getElementById('back-to-top');
        function checarPosicao() {
            if (window.scrollY > 200) {
                backToTopDiv.style.display = "block";
            } else {
                backToTopDiv.style.display = "none";
            }
        }
        window.addEventListener('scroll', checarPosicao);
    </script>
    @yield('scripts')
</html>

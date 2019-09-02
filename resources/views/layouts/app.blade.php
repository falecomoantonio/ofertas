<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Autenticação de Usuário - Rei das Vendas</title>
        <!-- CORE CSS-->
        <link href="{{ url("assets/login/materialize.css") }}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{ url("assets/login/style.css") }}" type="text/css" rel="stylesheet" media="screen,projection">
        <!-- CSS style Horizontal Nav (Layout 03)-->
        <link href="{{ url("assets/login/style-horizontal.css") }}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{ url("assets/login/page-center.css") }}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link href="{{ url('assets/login/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="{{ url("assets/login/perfect-scrollbar.css") }}" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            body {
                background-image: url("{{ url("assets/login/planodefundo.jpg") }}");
                background-attachment: fixed;
                background-size: cover;
            }
        </style>
    </head>
    <body class="cyan">
        <!-- Start Page Loading -->
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>

        <div id="login-page" class="row">
            @yield('CONTENT')
        </div>

        <!-- jQuery Library -->
        <script type="text/javascript" src="{{ url("assets/login/jquery.js") }}"></script>
        <!--materialize js-->
        <script type="text/javascript" src="{{ url("assets/js/materialize.min.js") }}"></script>
        <!--prism-->
        <script type="text/javascript" src="{{ url('assets/login/prism.js') }}"></script>
        <!--scrollbar-->
        <script type="text/javascript" src="{{ url("assets/login/perfect-scrollbar.min.js") }}"></script>

        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
        <script type="text/javascript" src="{{ url("assets/login/plugins.js") }}"></script>
    @yield('SCRIPT')
    </body>
</html>

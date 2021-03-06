<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield("title")
    </title>

    <!-- Styles -->
    <link href="{{ asset("css/page.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset("css/apple-touch-icon.png") }}">
    <link rel="icon" href="{{ asset("css/favicon.png") }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <style>
        #main-logo-text {
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            text-decoration: underline;
            color: white;
        }
    </style>
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <a id="main-logo-text" class="navbar-brand" href="{{ route("welcome") }}">
                <p class="lead">
                    Rudge Software
                </p>
            </a>
        </div>
        <a class="btn btn-dark" href="{{ route("login") }}">Login</a>

    </div>
</nav>
<!-- /.navbar -->


<!-- Header -->
@yield("header")
<!-- /.header -->


@yield("content")

@include("partials.footer")
<!-- Scripts -->
<script src="{{ asset("js/page.min.js") }}"></script>
<script src="{{ asset("js/script.js") }}"></script>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f1608a8927b2be8"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f160877839e3d1e"></script>
</body>
</html>

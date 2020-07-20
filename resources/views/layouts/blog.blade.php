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
        <a class="btn btn-xs btn-round btn-success" href="{{ route("login") }}">Login</a>

    </div>
</nav>
<!-- /.navbar -->


<!-- Header -->
@yield("header")
<!-- /.header -->


@yield("content")


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">
            <div class="col-6 col-lg-3">
                <a target="_blank" href="https://hephaestus-solutions.com" class="text-dark">
                    Hephaestus Solutions &copy;
                </a>
            </div>

            <div class="col-6 col-lg-3 text-right order-lg-last">
                <div class="social">
                    <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
                    <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
                    <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i
                            class="fa fa-instagram"></i></a>
                    <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                    <a class="nav-link" href="../uikit/index.html">Elements</a>
                    <a class="nav-link" href="../block/index.html">Blocks</a>
                    <a class="nav-link" href="../page/about-1.html">About</a>
                    <a class="nav-link" href="../blog/grid.html">Blog</a>
                    <a class="nav-link" href="../page/contact-1.html">Contact</a>
                </div>
            </div>

        </div>
    </div>
</footer><!-- /.footer -->


<!-- Scripts -->
<script src="{{ asset("js/page.min.js") }}"></script>
<script src="{{ asset("js/script.js") }}"></script>

</body>
</html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monka | @yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link rel="stylesheet" href="{{ url('/static/css/style.css?v='.time()) }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4069ce9f79.js" crossorigin="anonymous"></script>
    {{-- <script src="{{ url('/static/js/admin.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: rgba(240, 151, 181, 0.5);">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"> <img src="{{ url('/static/images/logo-nav.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-paw"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/store') }}"><i class="fas fa-paw"></i> Tienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/us') }}"><i class="fas fa-paw"></i> Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/car') }}"><i class="fas fa-cart-arrow-down"></i> <span
                                class="carnumber">0</span></a>
                    </li>

                    @if(Auth::guest())
                    <li class="nav-item link-acc">
                        <a class="nav-link btn" href="{{ url('/login') }}">Ingresar</a>
                        <a class="nav-link btn" href="{{ url('/register') }}">Registrarse</a>
                    </li>
                    @else
                    <li class="nav-item link-acc dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false" href="{{ url('#') }}">{{
                            Auth::user()->nombre }}</a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle"></i> Cuenta</a></li>
                            <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Salir</a>
                            </li>
                        </ul>
                    </li>
                    @endif

                </ul>
            </div>

        </div>

    </nav>

    @if (Session::has('message'))
    <div class="container">
        <div class="mtop16 alert alert-{{ Session::get('typealert') }}" style="display: none">
            {{ Session::get('message') }}
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <script>
                $('.alert').slideDown();
                setTimeout(function(){ $('.alert').slideUp(); }, 10000);
            </script>
        </div>
    </div>
    @endif

    <div class="wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 text-left mtop16">
                    <h6 style="color: white">CONTACTO</h6>
                    <p style="color: white">
                        Av. Union No. 1688 Local 2<br>
                        Calleria - Coronel Portillo<br>
                        Teléfonos: 961852369 – 990852112.<br>
                    </p>
                </div>
                <div class="col-xs-12 col-md-6 text-right mtop16">
                    <p style="color: white">ENCUENTRANOS EN LAS REDES</p>
                    <div class="redes-footer" style=" margin-right: 1em; margin-left: 1em;">
                        <a href="https://www.facebook.com/"><img width="50" height="50" src={{ url('/static/images/facebook.png') }}></a>
                        <a href="https://www.instagram.com/"><img width="50" height="50"
                                src={{ url('/static/images/ig.png') }}></a>
                        <a href="https://www.twitter.com/"><img width="50" height="50" src={{ url('/static/images/tw.png') }}></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <hr style="color: white">
                    <p class="text-muted small">Grupo Monka 2021&copy<br> Todos los derechos reservados.</p>
                    <hr style="color: white">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
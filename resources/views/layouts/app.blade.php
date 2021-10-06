<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('APP_NAME', 'Leymor') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dropdown.css') }}">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('APP_NAME', 'Leymor') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <ul class="navbar-nav ml-auto">
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('') }}</a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('') }}</a>
                            </li>
                            @endif
                            @else
                        </div>
                        <li class="nav-item dropdown text-warning">
                            <a class="nav-link dropdown-toggle position-relative" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="far fa-bell fa-lg"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white" style="top: 4px;" id="count">
                                    ...
                                </span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <div id="item-alerta" style="width: 20vw;">
                                </div>
                                @if (Auth::user()->rol_usuario == 'administrador')
                                    <li class="text-center"><a class="dropdown-item text-primary py-1" href="{{ route('homeubicacion') }}">Ver todas las alertas</a></li>
                                @elseif(Auth::user()->rol_usuario == 'gerente')
                                    <li class="text-center"><a class="dropdown-item text-primary py-1" href="{{ route('userubicacion') }}">Ver todas las alertas</a></li>
                                @elseif(Auth::user()->rol_usuario == 'capataz')
                                    <li class="text-center"><a class="dropdown-item text-primary py-1" href="{{ route('ubicacion') }}">Ver todas las alertas</a></li>
                                @endif
                            </ul>
                        </li>
                        <label class="dropdown">
                            <div class="dd-button">
                                {{ Auth::user()->nombres_usuario }} {{ Auth::user()->apellidos_usuario }}
                            </div>

                            <input type="checkbox" class="dd-input" id="test">

                            <ul class="dd-menu">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>

                            @if (Auth::user()->rol_usuario == 'administrador')
                            <a class="dropdown-item" href="{{ url('user/password') }}" style="color: black;">Cambiar contraseña</a>
                            @endif

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>

                    </label>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        function openSweetAlert(alertas){
            Swal.fire({
                title: 'REPORTE DE ALERTA!',
                text: "Usted tiene "+alertas.length+" nuevas alertas.",
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Mostrar Alertas'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/ubicacion";
                }
            })
        }
        function alertas(){
            $.ajax({
                url: '/alertas',
                type: "GET",
                success: function(data){
                    console.log(data.alertas)
                    $( "#item-alerta" ).html("");
                    $( "#count" ).html(data.alertas.length);
                    for (let key in data.alertas) {
                        console.log(data.alertas[key].mensaje_alerta);
                        $( "#item-alerta" ).append(
                            '<li>'+
                                '<a class="dropdown-item" href="#">' +
                                    '<div class="row">'+
                                        '<div class="col-md-6">'+
                                            '<strong>Mensaje: </strong>' + data.alertas[key].mensaje_alerta + '<br>'+
                                            '<strong>Bovino: </strong>' + data.alertas[key].id_bovino +
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            '<strong>Fecha: </strong>' + data.alertas[key].fecha_alerta + '<br>'+
                                            '<strong>Hora: </strong>' + data.alertas[key].hora_alerta +
                                        '</div>'+
                                    '</div>'+
                                '</a>'+
                            '</li>'+
                            '<hr>'
                        );
                    }
                    //openSweetAlert(data.alertas)
                },
                error: function (e){
                    setTimeout(function(){
                        console.log("error");
                    }, 500);
                },
            });
        }
        alertas()
        //setInterval(alertas, 30000);
    </script>
</div>
</body>
</html>


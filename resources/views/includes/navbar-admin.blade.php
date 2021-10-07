<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('APP_NAME', 'Leymor') }}
        </a>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw mr-1"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter" style="font-size: 100%;" id="count">...</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Centro de alertas
                </h6>
                <div id="item-alerta">

                </div>
                @if (Auth::user()->rol_usuario == 'administrador')
                    <a class="dropdown-item text-center small text-gray-500" href="{{ route('homeubicacion') }}">Ver todas las alertas</a>
                @elseif(Auth::user()->rol_usuario == 'gerente')
                    <a class="dropdown-item text-center small text-gray-500" href="{{ route('userubicacion') }}">Ver todas las alertas</a>
                @elseif(Auth::user()->rol_usuario == 'capataz')
                    <a class="dropdown-item text-center small text-gray-500" href="{{ route('ubicacion') }}">Ver todas las alertas</a>
                @endif
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->nombres_usuario }} {{ Auth::user()->apellidos_usuario }}</span>
                <i class="fas fa-user"></i>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off fa-sm fa-fw mr-2 text-gray-500"></i>
                    Salir
                </a>
                @if (Auth::user()->rol_usuario == 'administrador')
                <a class="dropdown-item" href="{{ url('user/password') }}" style="color: black;">
                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-500"></i> Cambiar contraseña
                </a>
                @endif

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    </ul>
</nav>
@push('head')
<script>
    function alertas(){
        $.ajax({
            url: '/alertas',
            type: "GET",
            success: function(data){
                console.log(data.alertas)
                $( "#item-alerta" ).html("");
                $( "#count" ).html(data.alertas.length);
                for (let key in data.alertas) {
                    //console.log(data.alertas[key].mensaje_alerta);
                    $( "#item-alerta" ).append(
                        '<div class="dropdown-item d-flex align-items-center">'+
                            '<div class="mr-3">'+
                                '<div class="icon-circle bg-warning">'+
                                    '<i class="fas fa-exclamation-triangle text-white"></i>'+
                                '</div>'+
                            '</div>'+
                            '<div>'+
                                '<div class="small text-gray-500">' + data.alertas[key].fecha_alerta + ', ' + data.alertas[key].hora_alerta + '</div><strong>Mensaje: </strong>' + data.alertas[key].mensaje_alerta + '<br>' +
                                        '<strong>Bovino: </strong>' + data.alertas[key].id_bovino +
                            '</div>'+
                        '</div>'
                    );
                }
            },
            error: function (e){
                setTimeout(function(){
                    console.log("error");
                }, 500);
            },
        });
    }
    alertas()
    setInterval(alertas, 10000);
</script>
@endpush
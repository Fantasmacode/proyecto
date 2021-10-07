@extends('layouts.app')

@section('content')
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('administrador') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-home"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Menú capataz</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('bovino') || Request::is('bovino/*') || Request::is('comercio') || Request::is('comercio/*') || Request::is('baja') || Request::is('baja/*') || Request::is('proveedor') || Request::is('proveedor/*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-horse"></i>
                <span>Gestión de ganado</span>
            </a>
            <div id="collapseTwo" class="collapse {{ Request::is('bovino') || Request::is('bovino/*') || Request::is('comercio') || Request::is('comercio/*') || Request::is('baja') || Request::is('baja/*') || Request::is('proveedor') || Request::is('proveedor/*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Request::is('bovino') || Request::is('bovino/*')  ? 'active' : '' }}" href="{{ url('bovino') }}">Bovinos</a>
                    <!-- <a class="collapse-item" href="{{ url('mostrarestado') }}">Estado</a> -->
                    <a class="collapse-item {{ Request::is('comercio') || Request::is('comercio/*')  ? 'active' : '' }}" href="{{ url('comercio') }}">Comercio</a>
                    <a class="collapse-item {{ Request::is('baja') || Request::is('baja/*') ? 'active' : '' }}" href="{{ url('baja') }}">Muertes</a>
                    <a class="collapse-item {{ Request::is('proveedor') || Request::is('proveedor/*') ? 'active' : '' }}" href="{{ url('proveedor') }}">Proveedores</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('raza') || Request::is('raza/*') || Request::is('lote') || Request::is('lote/*') || Request::is('mostrarestadolote') || Request::is('mostrarestadolote/*') || Request::is('sectorizacion') || Request::is('sectorizacion/*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-map-marker-alt"></i>
                <span>Parametrización</span>
            </a>
            <div id="collapseUtilities" class="collapse {{ Request::is('raza') || Request::is('raza/*') || Request::is('lote') || Request::is('lote/*') || Request::is('mostrarestadolote') || Request::is('mostrarestadolote/*') || Request::is('sectorizacion') || Request::is('sectorizacion/*') ? 'show' : '' }}" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Request::is('raza') || Request::is('raza/*') ? 'active' : '' }}" href="{{ url('raza') }}" >Raza</a>
                    <a class="collapse-item {{ Request::is('lote') || Request::is('lote/*') ? 'active' : '' }}" href="{{ url('lote') }}" >Agregar Lote</a>
                    <a class="collapse-item {{ Request::is('mostrarestadolote') || Request::is('mostrarestadolote/*') ? 'active' : '' }}" href="{{ url('mostrarestadolote') }}">Filtro de Lotes</a>
                    <a class="collapse-item {{ Request::is('sectorizacion') || Request::is('sectorizacion/*') ? 'active' : '' }}" href="{{ url('sectorizacion') }}">Sectorización</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('traslado') || Request::is('traslado/*') || Request::is('retorno') || Request::is('retorno/*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTraslados"
                aria-expanded="true" aria-controls="collapseTraslados">
                <i class="fas fa-caravan"></i>
                <span>Traslados</span>
            </a>
            <div id="collapseTraslados" class="collapse {{ Request::is('traslado') || Request::is('traslado/*') || Request::is('retorno') || Request::is('retorno/*') ? 'show' : '' }}" aria-labelledby="headingTraslados"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Request::is('traslado') || Request::is('traslado/*') ? 'active' : '' }}" href="{{ url('traslado') }}" >Salidas</a>
                    <a class="collapse-item {{ Request::is('retorno') || Request::is('retorno/*') ? 'active' : '' }}" href="{{ url('retorno') }}" >Retorno</a>
                </div>
            </div>
        </li>

        <li class="nav-item {{ Request::is('ubicacion') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('ubicacion') }}">
            <i class="fas fa-map-marked-alt"></i>
            <span>Mapa </span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('includes.navbar-admin')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @if (Request::is('capataz'))
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bienvenida</h6>
                                </div>
                                <div class="card-body text-center">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="/img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    <p>Bienvenido al sistema: <strong>{{ Auth::user()->nombres_usuario }} {{ Auth::user()->apellidos_usuario }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Page Heading -->
                    <div class="mb-4">
                        @yield('form', '')
                    </div>
                @endif
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
@endsection
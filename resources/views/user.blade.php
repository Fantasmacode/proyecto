@extends('layouts.app')

@section('content')
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('administrador') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-home"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Menu Gerente</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item {{ Request::is('mostrarusuarios') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('mostrarusuarios') }}">
                <i class="fas fa-users"></i>
                <span>Usuarios</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('ganadousuario') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('ganadousuario') }}">
                <i class="fas fa-horse" ></i>
                <span>Bovinos</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('mostrarlotes') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('mostrarlotes') }}">
                <i class="fas fa-map-marker-alt"></i>
                <span>Lotes</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('mostrarcomercios') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('mostrarcomercios') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Comercios</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('mostrarproveedores') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('mostrarproveedores') }}">
                <i class="fas fa-industry alt"></i>
                <span>Proveedores</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('mostrarsalidas') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('mostrarsalidas') }}">
                <i class="fas fa-truck" ></i>
                <span>Salidas</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('mostrarretornos') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('mostrarretornos') }}">
                <i class="fas fa-undo-alt" ></i>
                <span>Retornos</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('mostrarmuertes') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('mostrarmuertes') }}">
                <i class="fas fa-skull-crossbones"></i>
                <span>Muertes</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('userubicacion') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('userubicacion') }}">
                <i class="fas fa-map" ></i>
                <span>Mapa</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('mostrarsectores') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('mostrarsectores') }}">
                <i class="fas fa-tree"></i>
                <span>Sectores</span>
            </a>
        </li>

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
                @if (Request::is('user'))
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
</div>
@endsection
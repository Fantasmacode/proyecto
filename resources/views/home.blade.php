@extends('layouts.app')

@section('content')
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('administrador') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-home"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Menú administrador</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item {{ Request::is('administrador') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('administrador') }}">
                <i class="fas fa-users"></i>
                <span>Usuarios</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('mostrarganado') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('mostrarganado') }}">
                <i class="fas fa-horse" ></i>
                <span>Bovinos</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('mostrar') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('mostrar') }}">
                <i class="fas fa-map-marker-alt"></i>
                <span>Lotes</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('comercios') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('comercios') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Comercios</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('proveedores') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('proveedores') }}">
                <i class="fas fa-industry alt"></i>
                <span>Proveedores</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('salidas') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('salidas') }}">
                <i class="fas fa-truck" ></i>
                <span>Salidas</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('retornos') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('retornos') }}">
                <i class="fas fa-undo-alt" ></i>
                <span>Retornos</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('muertes') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('muertes') }}">
                <i class="fas fa-skull-crossbones"></i>
                <span>Muertes</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('homeubicacion') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('homeubicacion') }}">
                <i class="fas fa-map" ></i>
                <span>Mapa</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('sectores') ? 'active' : '' }}">
            <a class="nav-link" href="{{  url('sectores') }}">
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
                @if (Request::is('home'))
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
@endsection
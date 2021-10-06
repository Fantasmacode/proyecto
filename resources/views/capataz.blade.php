@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 50px">
    <div class="row justify-content-center">
        <div class="col-md-12">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Capataz</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('dash/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('dash/css/sb-admin-2.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('administrador') }}" style="background-color:#008080;">
                <div class="fa fa-fw fa-home">
                </div>
                <div class="sidebar-brand-text mx-3">Menú capataz<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->   




        <li class="nav-item active" style="background-color:#008080;">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGanado"
                    aria-expanded="true" aria-controls="collapseGanado">
                <i class="fas fa-horse"></i>
                    <span>Gestión de ganado</span>
                </a>
                
                <div id="collapseGanado" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
                    <div class="bg-#008080 py-2 collapse-inner rounded">
                
                        <a class="collapse-item" href="{{ url('bovino') }}" >Bovinos</a>
                        <!-- <a class="collapse-item" href="{{ url('mostrarestado') }}">Estado</a> -->
                        <a class="collapse-item" href="{{ url('comercio') }}">Comercio</a>
                        <a class="collapse-item" href="{{ url('baja') }}">Muertes</a>
                        <a class="collapse-item" href="{{ url('proveedor') }}">Proveedores</a>
                    
                    </div>
                    
                </div>
            </li>


             <hr class="sidebar-divider my-0">

            <li class="nav-item active" style="background-color:#008080;">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLote"
                    aria-expanded="true" aria-controls="collapseLote">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Parametrización</span>
                </a>
                <div id="collapseLote" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-#008080 py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('raza') }}" >Raza</a>
                        <a class="collapse-item" href="{{ url('lote') }}" >Agregar Lote</a>
                        <a class="collapse-item" href="{{ url('mostrarestadolote') }}">Filtro de Lotes</a>
                        <a class="collapse-item" href="{{ url('sectorizacion') }}">Sectorización</a>
                    </div>
                </div>
            </li>


            
            <!-- Nav Item - Utilities Collapse Menu -->
           


            
           
           <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active" style="background-color:#008080;">
                <a class="nav-link" href="{{  url('alerta') }}">
                 <i class="fas fa-satellite-dish"></i>
                    <span>Reporte de alerta </span></a>
            </li>

            <!-- Heading -->
          <hr class="sidebar-divider my-0">

          <li class="nav-item active" style="background-color:#008080;">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTraslados"
                    aria-expanded="true" aria-controls="collapseTraslados">
                <i class="fas fa-caravan"></i>
                    <span>Traslados</span>
                </a>
                <div id="collapseTraslados" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-#008080 py-2 collapse-inner rounded">
                
                        <a class="collapse-item" href="{{ url('traslado') }}" >Salidas</a>
                        <a class="collapse-item" href="{{ url('retorno') }}" >Retorno</a>
                        


                    </div>
                </div>
            </li>

                <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active" style="background-color:#008080;">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMapa"
                    aria-expanded="true" aria-controls="collapseMapa">
                    <i class="fas fa-map-marked-alt"></i>
                    <span>Mapa</span>
                </a>
                <div id="collapseMapa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-#008080 py-2 collapse-inner rounded">
                
                        <a class="collapse-item" href="{{ route('ubicacion') }}" >Agregar Ubicación</a>

                    </div>
                </div>
            </li>
            

            

            
            <!-- Nav Item - Dashboard -->
            
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
         

            <!-- Nav Item - Utilities Collapse Menu -->
            
           

            <!-- Heading -->
          

            <!-- Nav Item - Pages Collapse Menu -->
            

            <!-- Nav Item - Charts -->
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0"style="background-color:#008080;" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="col-sm-11">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                           
                    </div>
                    @yield('form') 
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <footer>
    
    </footer>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('dash/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dash/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('dash/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('dash/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('dash/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('dash/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('dash/js/demo/chart-pie-demo.js') }}"></script>


@yield('js')
</body>

</html>
        </div>
    </div>
</div>
@endsection
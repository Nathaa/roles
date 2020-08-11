<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
  
    <title>Centro Escolar General Francisco Morazan</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="{{ asset('dist/js/adminlte.js')}}"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    
    <!-- usuario navbar-->
    
    <!-- usuario navbar-->
    <!-- usuario navbar-->
    <!-- usuario navbar-->

    

   <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow">
           <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" width="30" height="30"alt="User Image">
            {{ Auth::user()->name }}
            </a>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Salir {{ Auth::user()->name }}
            </a>
            </div>
         </li>
     
</ul>
    


</nav>
<!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      
      <a href="{{ url('/') }}" class="brand-link">
            <img src="/img/logo.jpg"  class="brand-image img-circle">
            <span class="brand-text font-weight-bold font-style-italic"><p><i>CEFRAM</i></p></span>
        </a>
    
      

      <!-- Sidebar Menu -->
   
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle href="/" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nav-icon fas fa-folder-open"></i>
                  <p>
                    Expedientes Alumnas
                  </p>
                </a>

                
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <div class="dropdown-divider"></div>
                  <h6 class="dropdown-header">Opciones:</h6>
                 <a class="dropdown-item" href="{{ route('estudiantes.index') }}">Expediente Alumna</a>
                  <a class="dropdown-item" href="forgot-password.html">Matricular Alumna</a>
              </li>
              <li class="nav-item dropdown">
                <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="{{ route('estudiantes.index') }}">Espedientes Alumnas
                          <span class="badge badge-pill badge-success">Pro</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">Matricular Alumnas</a>
                      </li>
                      <li>
                        <a href="#">Dashboard 3</a>
                      </li>
                    </ul>
                  </div>

                  <li class="nav-item">
                    <a href="{{ route('usuarios.index') }}" class="nav-link">
                      <i class="nav-icon fas fa-user-friends"></i>
                      <p>
                        Usuarios
                      </p>
                    </a>
                  </li>
                <a href="{{ route('usuarios.index') }}" class="nav-link dropdown-toggle href="{{ route('usuarios.index') }}" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    otro
                  </p>
                </a>
              </li>
        
              
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          @yield('content')
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
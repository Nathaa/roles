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

  <title>Sistema Academico</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
  <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
  <script src="{{ asset('js/funciones.js') }}"></script>
  @yield('css_role_page')
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin') }}" class="nav-link">Pagina Principal</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" name="search" nombre="search" type="search" placeholder="Buscar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <li class="nav-item d-none d-sm-inline-block">
    <ul class="navbar-nav ml-auto">
        <div class="nav-link dropdown no-arrow">

        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">

            @if(\Session::has('anio'))
              {{ \Session::get('anio') }}
            @else
              <?php
                $defecto = App\Anio::select('nombre')->where('id',
                  \Session::get('idAnio'))->first();
              ?>
                @if(is_null($defecto))
                Años
                @else
                  {{ $defecto->nombre }}
                @endif
            @endif
      </span>
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu" id="anios">
          @foreach(App\Anio::orderBy('año','DESC')->get() as $anio)
            <li>
              <a href="{{ route('anios.index',$anio->id) }}">
                {{ $anio->año }}
              </a>
            </li>
          @endforeach

        </ul>

        </div>
    </ul>
    </li>
    <!-- User Account Menu -->
    <ul class="navbar-nav ml-auto">
        <div class="nav-link dropdown no-arrow">
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a  class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset('dist/img/user.jpg')}}" class="user-image" style="max-width:30px" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">

                <!-- Menu Footer-->
                <li class="user-footer">

                  <div class="text-center">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('salir-form').submit();" class="btn btn-default btn-flat btn-salir">Salir</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: none;" id="salir-form">
                      {{ csrf_field() }}
                    </form>
                  </div>
                </li>
            </ul>
        </div>
        </ul>



  </nav>









  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sistema Academico</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
              <a href="#" class="d-block">
                  @guest
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                  @else
                  <div class="image">

                    <!-- <img src="{{asset('imagenes/'.Auth::user()->imagen) }}" class="img-circle elevation-2"> -->
                    <img src="{{asset('dist/img/user.jpg')}}" class="img-circle" height: 100px;
                    width: 100px; alt="User Image">
                </div>
                  {{ Auth::user()->name }}
                  @endguest
              </a>

          </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            @can('estudiantes.index')
            <a href="{{ route ('estudiantes.index') }}" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Expediente Alumna

              </p>
            </a>
            @endcan
            <ul>
              <li><a href="">Submenu1</a></li>
              <li><a href="">Submenu2</a></li>
            </ul>
          </li>

          <li class="nav-item">
            @can('usuarios.index')
            <a href="{{ route ('usuarios.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Usuarios

              </p>
            </a>
            @endcan
            <ul>
              <li><a href="">Submenu1</a></li>
              <li><a href="">Submenu2</a></li>
            </ul>
          </li>
          <li class="nav-item">
            @can('roles.index')
            <a href="{{ route ('roles.index') }}" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Roles

              </p>
            </a>
            @endcan
            <ul>
              <li><a href="">Submenu1</a></li>
              <li><a href="">Submenu2</a></li>
            </ul>
          </li>
          <li class="nav-item">
            @can('periodos.index')
            <a href="{{ route ('periodos.index') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Periodos

              </p>
            </a>
            @endcan
            <ul>
              <li><a href="">Submenu1</a></li>
              <li><a href="">Submenu2</a></li>
            </ul>
          </li>
          <li class="nav-item">
            @can('matriculas.index')
            <a href="{{ route ('matriculas.index') }}" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Matrículas

              </p>
            </a>
            @endcan
            <ul>
              <li><a href="">Submenu1</a></li>
              <li><a href="">Submenu2</a></li>
            </ul>
          </li>
          <li class="nav-item">
            @can('anios.index')
            <a href="{{ route ('anios.index') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Años

              </p>
            </a>
            @endcan
            <ul>
              <li><a href="">Submenu1</a></li>
              <li><a href="">Submenu2</a></li>
            </ul>
          </li>
          <li class="nav-item">
            @can('grados.index')
            <a href="{{ route ('grados.index') }}" class="nav-link">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Grados

              </p>
            </a>
            @endcan
            <ul>
              <li><a href="">Submenu1</a></li>
              <li><a href="">Submenu2</a></li>
            </ul>
          </li>
          <li class="nav-item">
          @can('materias.index')
            <a href="{{ route ('materias.index') }}" class="nav-link">
              <i class="nav-icon 	fas fa-book-reader"></i>
              <p>
               Materias
              </p>
            </a>
            @endcan
            <ul>
              <li><a href="">Submenu1</a></li>
              <li><a href="">Submenu2</a></li>
            </ul>
          </li>

          <li class="nav-item">
            @can('turnos.index')
            <a href="{{ route ('turnos.index') }}" class="nav-link">
              <i class="nav-icon 	fas fa-clock"></i>
              <p>
               Turnos
              </p>
            </a>
            @endcan
            <ul>
              <li><a href="">Submenu1</a></li>
              <li><a href="">Submenu2</a></li>
            </ul>
          </li>

          <li class="nav-item">
          @can('docentes.index')
            <a href="{{ route ('docentes.index') }}" class="nav-link">
              <i class="nav-icon 	fas fa-store-alt"></i>
              <p>
               Docentes
              </p>
            </a>
            @endcan
            <ul>
              <li><a href="">Submenu1</a></li>
              <li><a href="">Submenu2</a></li>
            </ul>
          </li>

          <li class="nav-item">
            @can('planEstudio.index')
            <a href="{{ route ('planesEstudio.index') }}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
              <p>
                Planes de Estudio

              </p>
            </a>
            @endcan
            <ul>
              <li><a href="">Submenu1</a></li>
              <li><a href="">Submenu2</a></li>
            </ul>
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
           @yield('title')
          </div><!-- /.col -->
         @yield('crear')
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if (session('info'))
  <div class="container">
      <div class="row">
          <div class="col-md-12 col-md-offset-2">
              <div class="alert alert-info">
                  {{ session('info') }}
              </div>
          </div>
      </div>
  <div

    @endif
    @yield('content')
    <!-- Main content -->
    <div class="content">

    </div>
    <!-- /.content -->
  </div>
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
      <strong>2020</strong>
    </div>
    <!-- Default to the left -->
     Centro Escolar General Francisco Morazan.

  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
@yield('css_role_page')
@yield('js_role_page')
@yield('js_user_page')
@yield('scripts')
</body>
</html>

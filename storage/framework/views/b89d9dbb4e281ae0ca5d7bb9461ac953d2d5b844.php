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
  <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <?php echo $__env->yieldContent('css_role_page'); ?>
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
        <a href="<?php echo e(route('admin')); ?>" class="nav-link">Pagina Principal</a>
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

            <?php if(\Session::has('anio')): ?>
              <?php echo e(\Session::get('anio')); ?>

            <?php else: ?>
              <?php
                $defecto = App\Anio::select('nombre')->where('id',
                  \Session::get('idAnio'))->first();
              ?>
                <?php if(is_null($defecto)): ?>
                Años
                <?php else: ?>
                  <?php echo e($defecto->nombre); ?>

                <?php endif; ?>
            <?php endif; ?>
      </span>
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu" id="anios">
          <?php $__currentLoopData = App\Anio::orderBy('año','DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
              <a href="<?php echo e(route('anios.index',$anio->id)); ?>">
                <?php echo e($anio->año); ?>

              </a>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
              <img src="<?php echo e(asset('dist/img/user.jpg')); ?>" class="user-image" style="max-width:30px" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
            </a>
            <ul class="dropdown-menu">

                <!-- Menu Footer-->
                <li class="user-footer">

                  <div class="text-center">
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('salir-form').submit();" class="btn btn-default btn-flat btn-salir">Salir</a>
                    <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;" id="salir-form">
                      <?php echo e(csrf_field()); ?>

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
    <a href="<?php echo e(route('admin')); ?>" class="brand-link">
      <img src="<?php echo e(asset('dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sistema Academico</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
              <a href="#" class="d-block">
                  <?php if(auth()->guard()->guest()): ?>
                  <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Iniciar Sesión')); ?></a>
                  <?php else: ?>
                  <div class="image">

                    <!-- <img src="<?php echo e(asset('imagenes/'.Auth::user()->imagen)); ?>" class="img-circle elevation-2"> -->
                    <img src="<?php echo e(asset('dist/img/user.jpg')); ?>" class="img-circle" height: 100px;
                    width: 100px; alt="User Image">
                </div>
                  <?php echo e(Auth::user()->name); ?>

                  <?php endif; ?>
              </a>

          </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('estudiantes.index')): ?>
            <a href="<?php echo e(route ('estudiantes.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Expediente Alumna

              </p>
            </a>
            <?php endif; ?>
          </li>

          <li class="nav-item">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.index')): ?>
            <a href="<?php echo e(route ('usuarios.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Usuarios

              </p>
            </a>
            <?php endif; ?>
          </li>
          <li class="nav-item">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.index')): ?>
            <a href="<?php echo e(route ('roles.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Roles

              </p>
            </a>
            <?php endif; ?>
          </li>
          <li class="nav-item">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('periodos.index')): ?>
            <a href="<?php echo e(route ('periodos.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Periodos

              </p>
            </a>
            <?php endif; ?>
          </li>
          <li class="nav-item">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('matriculas.index')): ?>
            <a href="<?php echo e(route ('matriculas.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Matrículas

              </p>
            </a>
            <?php endif; ?>
          </li>
          <li class="nav-item">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('anios.index')): ?>
            <a href="<?php echo e(route ('anios.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Años

              </p>
            </a>
            <?php endif; ?>
          </li>
          <li class="nav-item">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('grados.index')): ?>
            <a href="<?php echo e(route ('grados.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Grados

              </p>
            </a>
            <?php endif; ?>
          </li>
          <li class="nav-item">
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('materias.index')): ?>
            <a href="<?php echo e(route ('materias.index')); ?>" class="nav-link">
              <i class="nav-icon 	fas fa-book-reader"></i>
              <p>
               Materias
              </p>
            </a>
            <?php endif; ?>
          </li>

          <li class="nav-item">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('turnos.index')): ?>
              <a href="<?php echo e(route ('turnos.index')); ?>" class="nav-link">
                <i class="nav-icon 	fas fa-clock"></i>
                <p>
                 Turnos
                </p>
              </a>
              <?php endif; ?>
            </li>
          <li class="nav-item">
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('docentes.index')): ?>
            <a href="<?php echo e(route ('docentes.index')); ?>" class="nav-link">
              <i class="nav-icon 	fas fa-store-alt"></i>
              <p>
               Docentes
              </p>
            </a>
            <?php endif; ?>
          </li>
          <li class="nav-item">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planEstudio.index')): ?>
            <a href="<?php echo e(route ('planesEstudio.index')); ?>" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
              <p>
                Planes de Estudio

              </p>
            </a>
            <?php endif; ?>
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
           <?php echo $__env->yieldContent('title'); ?>
          </div><!-- /.col -->
         <?php echo $__env->yieldContent('crear'); ?>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php if(session('info')): ?>
  <div class="container">
      <div class="row">
          <div class="col-md-12 col-md-offset-2">
              <div class="alert alert-info">
                  <?php echo e(session('info')); ?>

              </div>
          </div>
      </div>
  <div

    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
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
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<?php echo $__env->yieldContent('css_role_page'); ?>
<?php echo $__env->yieldContent('js_role_page'); ?>
<?php echo $__env->yieldContent('js_user_page'); ?>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/admin/index2.blade.php ENDPATH**/ ?>
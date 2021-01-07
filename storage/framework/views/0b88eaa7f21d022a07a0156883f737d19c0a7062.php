<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">

  </ol>
  <?php if(Session::has('success_message')): ?>
    <div id="msj_verde" class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo e(Session::get('success_message')); ?>

    </div>
  <?php endif; ?>

  <?php if(Session::has('info_message')): ?>
    <div id="msj_azul" class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo e(Session::get('info_message')); ?>

    </div>
  <?php endif; ?>

  <?php if(Session::has('danger_message')): ?>
    <div id="msj_rojo" class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo e(Session::get('danger_message')); ?>

    </div>
  <?php endif; ?>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">

    <h6>
   <?php if($search): ?>
  <div class="alert alert-info" role="alert">
    Los resultados de tu busqueda <?php echo e($search); ?> son
  </div>
  <?php endif; ?>
 </h6>

 <div class="container-fluid">
    <div class="card">
        <div class="card-header">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('grados.create')): ?>
                 <a href="<?php echo e(route('grados.create')); ?>"> <button type="button" class="btn btn-dark btn-xs">
                <i class="fas fa-plus"></i>Crear Grado </button> </a>
            <?php endif; ?>
        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="<?php echo e(route('grados.index')); ?>"><i class="fa fa-align-justify"></i> Listado Grados</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Grado</th>
           <th scope="col">Seccion</th>
           <th scope="col">Categoria</th>
           <th scope="col">Turno</th>
           <th colspan="4">&nbsp;Opciones</th>

         </tr>
       </thead>
       <tbody>
          <?php $__currentLoopData = $grados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <td><?php echo e($grado->grado); ?></td>
            <td><?php echo e($grado->seccion); ?></td>
            <td><?php echo e($grado->categoria); ?></td>
            <?php if($grado->turnos_id==1): ?>   
              <td>Matutino</td>
            <?php endif; ?>
            <?php if($grado->turnos_id==2): ?>   
              <td>Vespertino</td>
            <?php endif; ?>      
            <?php if($grado->turnos_id==3): ?>   
              <td>Completo</td>
            <?php endif; ?>        
            <td width="10px">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('grados.edit')): ?>

                <a href="<?php echo e(route('grados.edit', $grado->id)); ?>" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
                  <?php endif; ?>
                </td>
                <td width="10px">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('grados.show')): ?>

                <a href="<?php echo e(route('grados.show', $grado->id)); ?>" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>

                <?php endif; ?>
                </td>
                <td width="10px">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('grados.destroy')): ?>
                <?php echo Form::open(['route' => ['grados.destroy', $grado->id],
  'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el grado?")']); ?>

  <button class="btn btn-danger" class="btn btn-info btn-flat" title="Eliminar">
    <i class="fas fa-trash" aria-hidden="true"></i>
  </button>
<?php echo Form::close(); ?>

                <?php endif; ?>
                </td>

           </tr>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </tbody>
      </table>
      <br>
            <div class="row">
              <div class="mr-auto">
                <?php echo e($grados->links()); ?>

              </div>
            </div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
  
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/grados/index.blade.php ENDPATH**/ ?>
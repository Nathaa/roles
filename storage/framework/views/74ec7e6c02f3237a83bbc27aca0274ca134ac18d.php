<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">

  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">

    <h6>

 </h6>

 <?php if(Session::has('success_message')): ?>
 <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo e(Session::get('success_message')); ?>

 </div>
 <?php endif; ?>

 <?php if(Session::has('info_message')): ?>
 <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo e(Session::get('info_message')); ?>

 </div>
 <?php endif; ?>

 <?php if(Session::has('danger_message')): ?>
 <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo e(Session::get('danger_message')); ?>

 </div>
 <?php endif; ?>

 <div class="container-fluid">
    <div class="card">
        <div class="card-header">

            <td width="10px">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('asignaciones.create')): ?>
                <a href="<?php echo e(route('asignaciones.create')); ?>"> <button type="button" class="btn btn-dark btn-xs">
               <i class="fas fa-plus"></i>Crear Asignacion_academico </button> </a>
           <?php endif; ?>
        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="<?php echo e(route('asignaciones.index')); ?>"><i class="fa fa-align-justify"></i> Listado asignaciones</a>
                </div>


            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Grados</th>
           <th scope="col">Materias</th>
           <th scope="col">Periodos</th>

           <th colspan="3">&nbsp;Opcion</th>
         </tr>

       <tbody>

        <?php $__currentLoopData = $asignaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <td><?php echo e($asignacion->grado); ?></td>
            <td><?php echo e($asignacion->materias); ?></td>
            <td><?php echo e($asignacion->periodos); ?></td>


            <td width="10px">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('asignaciones.edit')): ?>

                <a href="<?php echo e(route('asignaciones.edit', $asignacion->grado)); ?>" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
                  <?php endif; ?>
                </td>
                <td width="10px">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('asignaciones.show')): ?>

                <a href="<?php echo e(route('asignaciones.show', $asignacion->grado)); ?>" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>

                <?php endif; ?>
                </td>
                <td width="10px">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('asignaciones.destroy')): ?>
                <?php echo Form::open(['route' => ['asignaciones.destroy', $asignacion->grado],
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

</div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/asignaciones/index.blade.php ENDPATH**/ ?>
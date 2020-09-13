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
   <?php if($search): ?>
  <div class="alert alert-info" role="alert">
    Los resultados de tu busqueda <?php echo e($search); ?> son
  </div>
  <?php endif; ?>
 </h6>
 <div class="container-fluid">
    <div class="card">
        <div class="card-header">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planesEstudio.create')): ?>
                 <a href="<?php echo e(route('planesEstudio.create')); ?>"> <button type="button" class="btn btn-dark btn-xs">
                <i class="fas fa-plus"></i>Crear Plan de Estudio </button> </a>
            <?php endif; ?>
        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="<?php echo e(route('planesEstudio.index')); ?>"><i class="fa fa-align-justify"></i> Listado de Planes</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Plan</th>
           <th scope="col">Duracion</th>
           <th colspan="3">&nbsp;Opciones</th>
         </tr>
       </thead>
       <tbody>
          <?php $__currentLoopData = $planesEstudio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planEstudio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <td><?php echo e($planEstudio->nombre_plan); ?></td>
            <td><?php echo e($planEstudio->duracion); ?></td>
            <td width="10px">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planesEstudio.edit')): ?>

                <a href="<?php echo e(route('planesEstudio.edit', $planEstudio->id)); ?>" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
                  <?php endif; ?>
                </td>
                <td width="10px">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planesEstudio.show')): ?>

                <a href="<?php echo e(route('planesEstudio.show', $planEstudio->id)); ?>" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>

                <?php endif; ?>
                </td>
                <td width="10px">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planesEstudio.destroy')): ?>
                <?php echo Form::open(['route' => ['planesEstudio.destroy', $planEstudio->id],
  'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el expediente?")']); ?>

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

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/planesEstudio/index.blade.php ENDPATH**/ ?>
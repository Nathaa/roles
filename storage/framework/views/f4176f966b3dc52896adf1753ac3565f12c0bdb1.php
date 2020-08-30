<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('anios.create')): ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('anios.create')); ?>">Agregar Nuevo Año</a></li>
    <?php endif; ?>
  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
<h3>Lista de Años</h3>
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
 <div class="card">
 <div class="card-boady">
 <table class="table table-bordered table-hover">
         <tr>

           <th scope="col">Año lectivo</th>
           <th scope="col">Duracion en semanas</th>
           
         </tr>
       </thead>
       <tbody>
          <?php $__currentLoopData = $anios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('anios.show')): ?>
             <td><a href="<?php echo e(route('anios.show', $anio->id)); ?>"><?php echo e($anio->nombre); ?></td></a>
             <td><?php echo e($anio->duracion); ?></td>
             
            <?php endif; ?>
             <td>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('anios.destroy')): ?>
              <?php echo Form::open(['route' => ['anios.destroy', $anio->id],
              'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el Año?")']); ?>

              <button class="btn btn-sm btn-danger">
                  Eliminar
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Materias UES Damaris\Sistema_Oficial_CEFRAM\roles\resources\views/anios/index.blade.php ENDPATH**/ ?>
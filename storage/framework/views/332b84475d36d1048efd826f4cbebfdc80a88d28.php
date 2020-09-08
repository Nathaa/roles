<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planesEstudio.create')): ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('planesEstudio.create')); ?>">Agregar Plan de Estudio</a></li>
    <?php endif; ?>
  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
<h3>Lista de planes de estudio</h3>
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

           <th scope="col">Plan</th>
           <th scope="col">Duracion</th>
           <th scope="col">Opciones</th>
         </tr>
       </thead>
       <tbody>
          <?php $__currentLoopData = $planesEstudio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planEstudio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planesEstudio.show')): ?>
             <td><a href="<?php echo e(route('planesEstudio.show', $planEstudio->id)); ?>"><?php echo e($planEstudio->nombre_plan); ?></td></a>
             <td><?php echo e($planEstudio->duracion); ?></td>
            <?php endif; ?>
             <td>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planesEstudio.destroy')): ?>
              <?php echo Form::open(['route' => ['planesEstudio.destroy', $planEstudio->id],
              'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el registro de plan de estudio?")']); ?>

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

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\GitHub\roles\resources\views/planesEstudio/index.blade.php ENDPATH**/ ?>
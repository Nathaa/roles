<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('matriculas.create')): ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('matriculas.create')); ?>">Agregar Nueva Matrícula</a></li>
    <?php endif; ?>
  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
<h3>Lista de Matrículas</h3>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">

  <h6>
   <?php if($search): ?>
  <div class="alert alert-info" role="alert">
    Los resultados de tu búsqueda <?php echo e($search); ?> son
  </div>
  <?php endif; ?>
 </h6>
 <div class="card">
 <div class="card-boady">
 <table class="table table-bordered table-hover">
         <tr>

           <th scope="col">Nombre</th>
           <th scope="col">Descripción</th>
         </tr>
       </thead>
       <tbody>
          <?php $__currentLoopData = $matriculas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matricula): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('matriculas.show')): ?>
             <td><a href="<?php echo e(route('matriculas.show', $matricula->id)); ?>"><?php echo e($matricula->nombre); ?></td></a>
             <td><?php echo e($matricula->descripcion); ?></td>
            <?php endif; ?>
              <td width="10">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('matriculas.show')): ?>
                <a href="<?php echo e(route('matriculas.show', $matricula->id)); ?>" class="btn btn-sm btn-default">Ver</a>
                <?php endif; ?>
              </td>
              <td width="10">
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('matriculas.edit')): ?>
                    <a href="<?php echo e(route('matriculas.edit', $matricula->id)); ?>" class="btn btn-sm btn-default">Editar</a>
                  <?php endif; ?>
              </td> 
             <td>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('matriculas.destroy')): ?>
              <?php echo Form::open(['route' => ['matriculas.destroy', $matricula->id],
              'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar la matrícula?")']); ?>

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
<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IsraelErazo\Documents\roles\resources\views/matriculas/index.blade.php ENDPATH**/ ?>
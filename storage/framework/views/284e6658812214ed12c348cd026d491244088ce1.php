<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('docentes.create')): ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('docentes.create')); ?>">Crear Docente</a></li>
    <?php endif; ?>
  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
<h3>Lista de Docentes!!</h3>
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

           <th scope="col">Nombre</th>
           <th scope="col">Apellidos</th>
           <th scope="col">DUI</th>
         </tr>
       </thead>
       <tbody>
          <?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('docentes.show')): ?>
             <td><a href="<?php echo e(route('docentes.show', $docente->id)); ?>"><?php echo e($docente->nombre); ?></td></a>
             <td><?php echo e($docente->apellido); ?></td>
             <td><?php echo e($docente->dui); ?></td>

            <?php endif; ?>
             <td>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('docentes.destroy')): ?>
              <?php echo Form::open(['route' => ['docentes.destroy', $docente->id],
              'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el docente?")']); ?>

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




<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Documentos\GitHub\roles\resources\views/docentes/index.blade.php ENDPATH**/ ?>
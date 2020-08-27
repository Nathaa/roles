<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">


  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
<h3>Lista de usuarios</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<div class="card">

   <div class="card-boady">
    <table class="table table-bordered table-hover">
        <tr>

          <th scope="col">Nombre</th>
          <th scope="col">Correo</th>
          <th scope="col">Rol</th>
          <th scope="col">Permisos</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
         <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>

            <td><a href="<?php echo e(route('usuarios.show', $user->id)); ?>"><?php echo e($user->name); ?></td></a>
            <td><?php echo e($user->email); ?></td>
            <td>roles</td>
            <td>permisos</td>
              <td>
                  <?php echo Form::open(['route' => ['usuarios.destroy', $user->id],
                  'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el usuario")']); ?>

                  <button class="btn btn-sm btn-danger">
                      Eliminar
                  </button>
                <?php echo Form::close(); ?>

              </td>


          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
  </table>
   </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IsraelErazo\Documents\roles\resources\views/usuarios/index.blade.php ENDPATH**/ ?>
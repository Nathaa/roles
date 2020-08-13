<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="<?php echo e(route('roles.create')); ?>">Crear Nuevo Rol</a></li>

  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
<h3>Lista de Roles</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="card">
        <div class="card-boady">
                    <table class="table table-bordered table-hover">

                            <tr>

                                <th scope="col">Nombre</th>
                               <th scope="col">Descripcion</th>
                         <th scope="col">Opciones</th>

                            </tr>

                    <tbody>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($role->name); ?></td>
                            <td><?php echo e($role->description); ?></td>
                            <td>
                               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.show')): ?>
                                 <a href="<?php echo e(route('roles.show', $role->id)); ?>"
                                 class="btn btn-sm btn-default">
                                    Ver
                                 </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.edit')): ?>
                                      <a href="<?php echo e(route('roles.edit', $role->id)); ?>"
                                      class="btn btn-sm btn-default">
                                         Editar
                                      </a>
                                     <?php endif; ?>
                                     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.destroy')): ?>
                                     <?php echo Form::open(['route' => ['roles.destroy', $role->id],
                                     'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el rol?")']); ?>

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

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Materias UES Damaris\Sistema_Oficial_CEFRAM\roles\resources\views/roles/index.blade.php ENDPATH**/ ?>
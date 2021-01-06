<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.edit')): ?>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('usuarios.edit', $user->id)); ?>"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Usuario</button></a></li>
        <?php endif; ?>
        <li class="breadcrumb active"><a href="<?php echo e(route('usuarios.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h5><strong><?php echo e($user->name); ?></strong> </h5>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

            <div class="container">

                        <img width="150" src="<?php echo e($user->imagen); ?>" class="img-responsive">
             </div>
                    <div class="container">
                        <div class="card">

                           <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                    <th>Datos Personales Usuarios</th>
                                    </tr>

                                   </thead>
                            </table>
                        <table class="table table-bordered table-hover">


                            <tbody>


                                  <tr>
                                     <th scope="row"><strong>Nombre:</strong></th>
                                     <td> <p> <?php echo e($user->name); ?></p></td>
                                 </tr>
                                  <tr>
                                      <th scope="row"><strong>Apellido: </strong></th>
                                      <td><p> <?php echo e($user->apellidos); ?></p></td>
                                  </tr>
                                   <tr>
                                       <th scope="row"><strong>Email:</strong></th>
                                       <td><p> <?php echo e($user->email); ?></p></td>
                                 </tr>

                                  <tr>
                                       <th scope="row"><strong>Contraseña:</strong></th>
                                       <td> <p> <?php echo e($user->password); ?></p></td>
                                 </tr>



                           </tbody>
                       </table>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/usuarios/show.blade.php ENDPATH**/ ?>
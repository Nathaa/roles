<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="<?php echo e(route('usuarios.edit', $user->id)); ?>">Editar Usuario</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('usuarios.index', $user->id)); ?>">Regresar atras</a></li>
  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h3>Informacion del Usuario: <?php echo e($user->name); ?></h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

            <div class="container">

                        <img width="150" src="<?php echo e($user->imagen); ?>" class="img-responsive">
             </div>
                    <div class="container">
                        <div class="card">

                           <div class="card-boady">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                    <th>Datos Personales Alumnas</th>
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

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/usuarios/show.blade.php ENDPATH**/ ?>
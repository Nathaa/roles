<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('anios.edit')): ?>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('anios.edit', $anio->id)); ?>"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Años</button></a></li>
    <?php endif; ?>
    <li class="breadcrumb active"><a href="<?php echo e(route('anios.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h5><strong><?php echo e($anio->nombre); ?> <?php echo e($anio->año); ?></strong> </h5>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


                    <div class="container">


                           </div>
                            <div class="container">
                                <th scope="row"></th>


                                <div class="card">

                                   <div class="card-body">

                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                            <th>Datos del Año</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <th scope="row"><strong>Año lectivo:</strong></th>
                                        <td><p> <?php echo e($anio->año); ?></p></td>
                                        <td> <p> <?php echo e($anio->nombre); ?></p></td>
                                        
                                        <th scope="row"><strong>Duracion: </strong></th>
                                         <td><p> <?php echo e($anio->duracion); ?></p></td>
                                    </tr>
                                     <tr>

                                     </tr>

                                     <tr>

                                    </tr>


                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/anios/show.blade.php ENDPATH**/ ?>
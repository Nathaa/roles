<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('grados.edit')): ?>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('grados.edit', $grado->id)); ?>"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar grado</button></a></li>
    <?php endif; ?>
    <li class="breadcrumb active"><a href="<?php echo e(route('grados.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h5><strong><?php echo e($grado->grado); ?> <?php echo e($grado->seccion); ?> </strong> </h5>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>



                            <div class="container">
                                <th scope="row"></th>


                                <div class="card">

                                   <div class="card-body">

                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                            <th>Datos De Grado</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <td><p><strong>Grado: </strong> <?php echo e($grado->grado); ?></p></td>
                                            <td><p><strong>Seccion: </strong> <?php echo e($grado->seccion); ?></p></td>
                                                <td><p><strong>Categoria: </strong> <?php echo e($grado->categoria); ?></p></td>

                                    </tr>

                                </tbody>
                            </table>
                            </div>
                </div>
            </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/grados/show.blade.php ENDPATH**/ ?>
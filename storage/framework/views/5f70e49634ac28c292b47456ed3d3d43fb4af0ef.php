<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('asignaciones.edit')): ?>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('asignaciones.edit', $asignaciones->id)); ?>"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar grado</button></a></li>
    <?php endif; ?>
    <li class="breadcrumb active"><a href="<?php echo e(route('asignaciones.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h5><strong><?php echo e($grados->grado); ?> <?php echo e($grados->seccion); ?> </strong> </h5>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>



                            <div class="container">
                                <th scope="row"></th>


                                <div class="card">

                                   <div class="card-body">

                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                            <th>Datos de Asignacion</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <td><p><strong>Grado: </strong> <?php echo e($grados->grado); ?><?php echo e($grados->seccion); ?></p></td>
                                            <td><p><strong>Categoria: </strong> <?php echo e($grados->categoria); ?></p></td>
                                                <td><p><strong>Materia: </strong> <?php echo e($materias->nombre); ?></p></td>
                                                <td><p><strong>Periodo: </strong> <?php echo e($periodos->nombre_periodo); ?></p></td>
                                    </tr>

                                </tbody>
                            </table>
                            </div>
                </div>
            </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/asignaciones/show.blade.php ENDPATH**/ ?>
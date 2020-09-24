<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planeEstudio.edit')): ?>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('planesEstudio.edit', $planesEstudio->id)); ?>"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Plan de Estudio</button></a></li>
    <?php endif; ?>
    <li class="breadcrumb active"><a href="<?php echo e(route('planesEstudio.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h5><strong><?php echo e($planesEstudio->nombre_plan); ?></strong> </h5>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>



                            <div class="container">
                                <th scope="row"></th>


                                <div class="card">

                                   <div class="card-body">

                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                            <th>Datos De Plan de Estudios</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <td><p><strong>Nombre de plan: </strong> <?php echo e($planesEstudio->nombre_plan); ?></p></td>
                                            <td><p><strong>duracion: </strong> <?php echo e($planesEstudio->duracion); ?></p></td>

                                    </tr>

                                </tbody>
                            </table>
                            </div>
                </div>
            </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Documentos\GitHub\roles\resources\views/planesEstudio/show.blade.php ENDPATH**/ ?>
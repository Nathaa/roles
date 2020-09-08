<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('matriculas.edit')): ?>
        <li class="breadcrumb-item active"><a href="<?php echo e(route('matriculas.edit', $matricula->id)); ?>"><button type="button" class="btn btn-secondary  btn-sm"><i class="fas fa-edit"></i>Editar Matricula</button></a></li>
        <?php endif; ?>
        <li class="breadcrumb active"><a href="<?php echo e(route('matriculas.index')); ?>" ><button type="button" class="btn btn-dark  btn-sm"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h5><strong><?php echo e($matricula->nombre); ?></strong> </h5>
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
                                            <th>Datos de la Matricula</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <th scope="row"><strong>Nombre:</strong></th>
                                        <td> <p> <?php echo e($matricula->nombre); ?></p></td>
                                    </tr>
                                    <tr>

                                    </tr>
                                    <tr>
	                                    <th scope="row"><strong>Descripción:</strong></th>
	                                    <td><p> <?php echo e($matricula->descripcion); ?></p></td>
                                    </tr>

                                     <tr>

                                    </tr>

                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/matriculas/show.blade.php ENDPATH**/ ?>
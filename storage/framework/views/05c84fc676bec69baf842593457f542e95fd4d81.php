<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('matriculas.edit')): ?>
        <li class="breadcrumb-item active"><a href="<?php echo e(route('matriculas.edit', $matricula->id)); ?>"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Matricula</button></a></li>
        <?php endif; ?>
        <li class="breadcrumb active"><a href="<?php echo e(route('matriculas.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

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
                                        <th scope="row"><strong>Fecha de inscripcion:</strong></th>
                                        <td> <p> <?php echo e($matricula->fecha_matricula); ?></p></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong>Anio lectivo:</strong></th>
                                        <td> <p> <?php echo e($matricula->año); ?></p></td>
                                    </tr>
                                    <tr>
	                                    <th scope="row"><strong>Tipo de matricula:</strong></th>
	                                    <td><p> <?php echo e($matricula->tipoMatricula); ?></p></td>
                                    </tr>

                                     <tr>
                                        <th scope="row"><strong>Nombres estudiante:</strong></th>
	                                    <td><p> <?php echo e($matricula->nombre); ?></p></td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><strong>Apellidos estudiante:</strong></th>
	                                    <td><p> <?php echo e($matricula->apellido); ?></p></td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><strong>Grado:</strong></th>
	                                    <td><p> <?php echo e($matricula->grado); ?></p></td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><strong>Seccion:</strong></th>
	                                    <td><p> <?php echo e($matricula->seccion); ?></p></td>
                                    </tr>

                                    <tr>
                                        <th scope="row"><strong>Turno:</strong></th>
	                                    <td><p> <?php echo e($matricula->nombre_turno); ?></p></td>
                                    </tr>

                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/matriculas/show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('docentes.edit')): ?>
        <li class="breadcrumb-item active"><a href="<?php echo e(route('docentes.edit', $docente->id)); ?>"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Docente</button></a></li>
        <?php endif; ?>
        <li class="breadcrumb active"><a href="<?php echo e(route('docentes.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h5><strong><?php echo e($docente->nombre); ?> <?php echo e($docente->apellido); ?></strong> </h5>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


                    <div class="container">

                        <img width="150" src="<?php echo e($docente->imagen); ?>" class="img-responsive">
                           </div>
                            <div class="container">
                                <th scope="row"></th>
                                <p align="right"><strong>Fecha de Creacion: </strong> <?php echo e(Carbon\Carbon::parse($docente->created_at)->format('d/m/Y')); ?></p>

                                <div class="card">

                                   <div class="card-body">

                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                            <th>Datos Personales del Docente</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <td><p><strong>Nombre: </strong> <?php echo e($docente->nombre); ?></p></td>
                                            <td><p><strong>Apellido: </strong> <?php echo e($docente->apellido); ?></p></td>
                                                <td><p><strong>Fecha Nacimiento: </strong> <?php echo e(Carbon\Carbon::parse($docente->fecha_nacimiento)->format('d/m/Y')); ?></p></td>
                                    </tr>
                                    <tr>

                                                    <td><p><strong>Edad:</strong> <?php echo e($docente->edad); ?></p></td>
                                                    <td><p><strong>Direccion: </strong> <?php echo e($docente->direccion); ?></p></td>
                                                    <td><p><strong>DUI:</strong> <?php echo e($docente->dui); ?></p></td>
                                    </tr>
                                    <tr>


                                                    <td><p><strong>Sexo: </strong> <?php echo e($docente->sexo); ?></p></td>
                                                    <td><p><strong>Telefono :</strong> <?php echo e($docente->telefono); ?></p></td>
                                                    <td><p><strong>Turno que imparte :</strong> <?php echo e($turno->nombre_turno); ?></p></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/docentes/show.blade.php ENDPATH**/ ?>
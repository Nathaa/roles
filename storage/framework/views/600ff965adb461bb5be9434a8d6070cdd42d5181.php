<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('estudiantes.edit')): ?>
        <li class="breadcrumb-item active"><a href="<?php echo e(route('estudiantes.edit', $estudiante->id)); ?>"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Estudiante</button></a></li>
        <?php endif; ?>
        <li class="breadcrumb active"><a href="<?php echo e(route('estudiantes.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h5><strong><?php echo e($estudiante->nombre); ?> <?php echo e($estudiante->apellido); ?></strong> </h5>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


                    <div class="container">

                        <img width="150" src="<?php echo e($estudiante->imagen); ?>" class="img-responsive">
                           </div>
                            <div class="container">
                                <th scope="row"></th>
                                <p align="right"><strong>Fecha de Creacion: </strong> <?php echo e(Carbon\Carbon::parse($estudiante->created_at)->format('d/m/Y')); ?></p>

                                <div class="card">

                                   <div class="card-body">

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
                                        <td><p><strong>Nombre: </strong> <?php echo e($estudiante->nombre); ?></p></td>
                                            <td><p><strong>Apellido: </strong> <?php echo e($estudiante->apellido); ?></p></td>
                                                <td><p><strong>Fecha Nacimiento: </strong> <?php echo e(Carbon\Carbon::parse($estudiante->fecha_nacimiento)->format('d/m/Y')); ?></p></td>
                                    </tr>
                                    <tr>

                                                    <td><p><strong>Edad:</strong> <?php echo e($estudiante->edad); ?></p></td>
                                                    <td><p><strong>Direccion: </strong> <?php echo e($estudiante->direccion); ?></p></td>
                                                    <td><p><strong></strong></p></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="card">
                   <div class="card-body">
                        <table class="table table-bordered table-hover">
                           <thead class="bg-primary">
                            <tr>
                            <th>Datos Personales del Responsable</th>
                            </tr>

                           </thead>
                        </table>
                        <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td><p><strong>Nombre: </strong> <?php echo e($estudiante->encargado); ?></p></td>
                                <td><p><strong>Parentesco: </strong> <?php echo e($estudiante->parentesco); ?></p></td>
                                    <td><p><strong>Telefono Emergencia: </strong> <?php echo e($estudiante->telefono_emergencia); ?></p></td>
                              </tr>
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>
            <div class="container">
                <div class="card">
                   <div class="card-body">
                        <table class="table table-bordered table-hover">
                           <thead class="bg-primary">
                            <tr>
                            <th>Datos de Enfermedades</th>
                            </tr>

                           </thead>
                        </table>
                        <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td><p><strong>Padecimiento: </strong> <?php echo e($estudiante->padecimientos); ?></p></td>
                            <td><p><strong>Descripcion Padecimiento: </strong> <?php echo e($estudiante->descripcion_padecimiento); ?></p></td>
                                <td><p><strong>Alergia Medicamente: </strong> <?php echo e($estudiante->alergia_medicamento); ?></p></td>
                              </tr>
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

            <div class="container">
                <div class="card">
                   <div class="card-body">
                        <table class="table table-bordered table-hover">
                           <thead class="bg-primary">
                            <tr>
                            <th>Datos Personales de Padres</th>
                            </tr>

                           </thead>
                        </table>
                        <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>

                                <td><p><strong>Nombre padre: </strong> <?php echo e($estudiante->nombre_padre); ?></p></td>
                                <td><p><strong>Profesion padre: </strong> <?php echo e($estudiante->profesion_padre); ?></p></td>
                                <td><p><strong>Telefono padre: </strong> <?php echo e($estudiante->telefono_padre); ?></p></td>
                              </tr>
                              <tr>
                              <td><p><strong>Nombre Madre: </strong> <?php echo e($estudiante->nombre_madre); ?></p></td>
                                <td><p><strong>Profesion Madre: </strong> <?php echo e($estudiante->profesion_madre); ?></p></td>
                                    <td><p><strong>Telefono Madre: </strong> <?php echo e($estudiante->telefono_madre); ?></p></td>
                              </tr>
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/estudiantes/show.blade.php ENDPATH**/ ?>
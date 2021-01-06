<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('turnos.edit')): ?>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('turnos.edit', $turno->id)); ?>"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar turno</button></a></li>
    <?php endif; ?>
    <li class="breadcrumb active"><a href="<?php echo e(route('turnos.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h5><strong><?php echo e($turno->nombre_turno); ?> </strong> </h5>

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
                                            <th>Datos del Turno</th>
                                            </tr>

                                        </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <th scope="row"><strong>Nombre del Turno:</strong></th>
                                        <td> <p> <?php echo e($turno->nombre_turno); ?></p></td>
                                        <th scope="row"><strong>Hora de Entrada: </strong></th>
                                         <td><p> <?php echo e(Carbon\Carbon::parse($turno->hora_entrada)->isoFormat('H:mm A')); ?></p></td>
                                    </tr>
                                     <tr>

                                     </tr>
                                      <tr>
                                        <th scope="row"><strong>Hora de Salida: </strong></th>
                                        <td><p> <?php echo e(Carbon\Carbon::parse($turno->hora_salida)->isoFormat('H:mm A')); ?></p></td>

                                        <th scope="row"><strong>Cantidad de Horas: </strong></th>
                                        <td><p> <?php echo e(Carbon\Carbon::parse($turno->hora_entrada)->diff(Carbon\Carbon::parse($turno->hora_salida))->format("%H horas")); ?></p></td>
                                      </tr>

                                    <tr>

                                    </tr>


                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/turnos/show.blade.php ENDPATH**/ ?>
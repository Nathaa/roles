<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('docentes.edit')): ?>
        <li class="breadcrumb-item active"><a href="<?php echo e(route('docentegrados.edit', $docentegrado->id)); ?>"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Asignacion</button></a></li>
        <?php endif; ?>
        <li class="breadcrumb active"><a href="<?php echo e(route('docentegrados.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div><!-- /.col -->
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>


                    <div class="container">

                        
                           </div>
                            <div class="container">
                                <th scope="row"></th>
                                <p align="right"><strong>Fecha de Creacion: </strong> <?php echo e(Carbon\Carbon::parse($docentegrado->created_at)->format('d/m/Y')); ?></p>

                                <div class="card">

                                   <div class="card-body">

                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                            <th>Datos Asignacion Docente-Grado</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <td><p><strong>Docente: </strong> <?php echo e($docente->nombre); ?> <?php echo e($docente->apellido); ?></p></td>
                                        <td><p><strong>Grado: </strong> <?php echo e($grado->grado); ?> <?php echo e($grado->seccion); ?></p></td>
                                                <td><p><strong>Año: </strong> <?php echo e($anio->año); ?></p></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/docentegrados/show.blade.php ENDPATH**/ ?>
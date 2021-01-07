<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('materias.edit')): ?>
        <li class="breadcrumb-item active"><a href="<?php echo e(route('materias.edit', $materia->id)); ?>"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Materia</button></a></li>
        <?php endif; ?>
        <li class="breadcrumb active"><a href="<?php echo e(route('materias.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

    </ol>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h5><strong><?php echo e($materia->nombre); ?></strong> </h5>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="card">

       <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="bg-primary">
                <tr>
                <th>Datos de la Materia</th>
                </tr>

               </thead>
        </table>
    <table class="table table-bordered table-hover">


        <tbody>


              <tr>
                 <th scope="row"><strong>Nombre:</strong></th>
                 <td> <p> <?php echo e($materia->nombre); ?></p></td>
             </tr>
              <tr>
                  <th scope="row"><strong>Descripcion: </strong></th>
                  <td><p> <?php echo e($materia->descripcion); ?></p></td>
              </tr>

              <tr>
                   <th scope="row"><strong>Estado:</strong></th>
                   <td>
                    <?php if($materia->estado == '1'): ?>
                    <span class="badge badge-success">Activo</span>
                    <?php else: ?>
                    <span class="badge badge-danger">Desactivado</span>
                    <?php endif; ?>
            </td>

             </tr>



       </tbody>
   </table>

</div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/materias/show.blade.php ENDPATH**/ ?>
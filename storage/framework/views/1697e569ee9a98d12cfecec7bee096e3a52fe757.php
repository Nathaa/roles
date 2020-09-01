<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('materias.edit')): ?>
        <li class="breadcrumb-item active"><a href="<?php echo e(route('materias.edit', $materia->id)); ?>"><button type="button" class="btn btn-secondary  btn-sm"><i class="fas fa-edit"></i>Editar Expediente</button></a></li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('materias.index')): ?>
        <li class="breadcrumb-item active"><a href="<?php echo e(route('materias.index', $materia->id)); ?>" ><button type="button" class="btn btn-success  btn-sm"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
        <?php endif; ?>
    </ol>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<h3><strong>Materia  : </strong><?php echo e($materia->nombre); ?> </h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">

     <table class="table table-bordered table-hover">
         <thead class="bg-info sm" align="center">
             <tr>
             <th>Datos de la Materia</th>
             </tr>
            </thead>
    <table class="table table-bordered table-hover">
        <tbody>
                <div class="row register-form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
            
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-chalkboard-teacher text-info"></i></div>
                                </div>
                                <input class="form-control" type="text" value="<?php echo e($materia->nombre); ?>" disabled="true">
                            </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
            
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-file-alt text-info"></i></div>
            
                            </div>
                            <input class="form-control" type="text" value="<?php echo e($materia->descripcion); ?>" disabled="true">
                        </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
            
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-check text-info"></i></div>
            
                        </div>
                        <input class="form-control" type="text" value="<?php echo e($materia->estado); ?>" disabled="true">
                    </div>
              </div>
                </div>
            </div>
        </tbody>
     </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Materias UES Damaris\Sistema_Oficial_CEFRAM\roles\resources\views/materias/show.blade.php ENDPATH**/ ?>
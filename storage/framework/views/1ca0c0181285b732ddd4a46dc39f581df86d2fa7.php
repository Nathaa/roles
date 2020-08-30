<?php $__env->startSection('content'); ?>
<div class="container text-center" style="background-color: LightSteelBlue;">
    <i class="fa fa-book" style='font-size:36px;color : Gray'></i>
<h4>Edición de Materias : <?php echo e($materia->nombre); ?></h4>
</div>

<div class="row">
    <?php if(session('notificacion')): ?>
    <div class="alert alert-success ">
        <?php echo e(session('notificacion')); ?>

    </div>
    <?php endif; ?>
    
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        
        <?php echo Form::model($materia,['method'=>'PATCH','route'=>['materias.update', $materia->id]]); ?>

        <?php echo e(Form::token()); ?>

            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" name="nombre" value="<?php echo e($materia->nombre); ?>" class="form-control" style="width: 500px" placeholder="Nombre de la Materia">
            </div>
    
    
            <div class="form-group">
                <label for="descripcion"> Descripcion </label>
                <input type="text" name="descripcion" value="<?php echo e($materia->descripcion); ?>" class="form-control" style="width: 800px" placeholder="Breve descripcion sobre la Materia">
            </div>

            
            <div class="form-group">   
                <label for="estado"> Estado  </label>
                <select name="estado" class="form-control" style="width: 500px" required="required">
                    <option value="" disabled selected>Elige el Estado de la Materia</option>
                    <option value="1">1 - Activo (La materia esta siendo Impartida) </option>
                    <option value="0">0 - Inactivo (La materia ya no se imparte) </option>
                </select>
            </div>

            
        <div class="form-group">
            <button class="btn btn-primary btn-flat" type="submit"> Guardar </button>
            <a href="<?php echo e(route('materias.index')); ?>" class="btn btn-default btn-flat">Cancelar</a>
        <!--<button class="btn btn-danger" href="<?php echo e(route('materias.index')); ?>" type="reset"> Cancelar </button>-->
        </div>

        <?php echo Form::close(); ?>

    

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Materias UES Damaris\Sistema_Oficial_CEFRAM\roles\resources\views/materias/edit.blade.php ENDPATH**/ ?>
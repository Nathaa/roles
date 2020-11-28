<div class="form-group">
    <?php echo e(Form::label('name', 'Nombre')); ?>

    <?php echo e(Form::text('name',null,['class' => 'form-control'])); ?>

</div>
<div class="form-group">
        <?php echo e(Form::label('slug', 'URL Amigable')); ?>

        <?php echo e(Form::text('slug',null,['class' => 'form-control'])); ?>

</div>
<div class="form-group">
            <?php echo e(Form::label('description', 'Descripcion')); ?>

            <?php echo e(Form::textarea('description',null,['class' => 'form-control'])); ?>

</div>
<hr>
<h3>Permiso Especial</h3>
<div class="form-group">
    <label><?php echo e(Form::radio('special', 'all-access')); ?> Acceso Total</label>
    <label><?php echo e(Form::radio('special', 'no-access')); ?> Ningun Acceso</label>
</div>
<hr>
<h3>Lista de permisos</h3>
<div class="form-group">
  <ul class="list-unstyled">
     <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <li>
         <label>
        <?php echo e(Form::checkbox('permissions[]', $permission->id, null)); ?>

        <?php echo e($permission->name); ?>

        <em>(<?php echo e($permission->description ?:'Sin descripcion'); ?>)</em>
         </label>
     </li>

     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>

<div class="form-group">

        <?php echo e(Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary'])); ?>


    </div>
<?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/roles/form.blade.php ENDPATH**/ ?>
<?php echo csrf_field(); ?>


      <div class="row">
          <div class="col">
             <label>Imagen</label>
             <input type="file" name="imagen" class="form-control-file" class="text-center">
          </div>
     </div>
<hr>

     <div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos del Usuario
    </div>


<form>

       <div class="row">
          <div class="col">
            <?php echo e(Form::label('name', 'Nombre')); ?>

            <?php echo e(Form::text('name',null,['class' => 'form-control'])); ?>

          </div>
          <div class="col">
            <?php echo e(Form::label('apellidos', 'Apellidos')); ?>

            <?php echo e(Form::text('apellidos',null,['class' => 'form-control'])); ?>

          </div>

        </div>

        <div class="row">
            <div class="col">
               <?php echo e(Form::label('email', 'E mail')); ?>

               <?php echo e(Form::text('email',null,['class' => 'form-control'])); ?>

            </div>
            <div class="col">
                <?php echo e(Form::label('password', 'Contraseña')); ?>

               <?php echo e(Form::text('password',null,['class' => 'form-control', 'id'=>'password', 'onkeyup' => "validar_contrasenia(this)", 'onblur' => "validar_contrasenia(this)"])); ?>

               <div class="invalid-feedback" style="display:none">
                La contraseña debe contener al menos minuscula, una mayuscula y un número, NO puede tener otros simbolos  con una longitud de 8 a 16 caracteres.
              </div>
            </div>
        </div>
    <br>

        <h4>Lista de Roles</h4>
<div class="form-group">
  <ul class="list-unstyled">
     <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <li>
         <label>
        <?php echo e(Form::checkbox('roles[]', $role->id, null)); ?>

        <?php echo e($role->name); ?>

        <em>(<?php echo e($role->description ?:'Sin descripcion'); ?>)</em>
         </label>
     </li>

     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>

        <ol class="float-sm-right">
            <br><?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit'])); ?>

        </ol>

</form>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>




<?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/usuarios/form.blade.php ENDPATH**/ ?>
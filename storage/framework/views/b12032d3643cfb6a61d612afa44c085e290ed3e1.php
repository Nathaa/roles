<?php echo csrf_field(); ?>



<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos del Turno
</div>

<form id="formulario"> 

    <div class="row">
      <div class="col">
         <?php echo e(Form::label('nombre_turno', 'Turno')); ?>

            <select name="nombre_turno" class="form-control"  id="nombre_turno" onblur="validar_select(this)" required autofocus>
              <option value="">Seleccione un Turno</option>
                <?php $__currentLoopData = $arrayTurno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $array): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($array); ?>"> <?php echo e($array); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
            </select>
            <div class="invalid-feedback" style="display:none">
                El Turno no debe quedar vacío.
             </div>
        </div>
    </div>
<br>

    <div class="row">
        <div class="col">
            <?php echo e(Form::label('hora_entrada', 'Hora Entrada')); ?>

            <?php echo e(Form::time('hora_entrada',null,['class' => 'form-control', 'id'=>'hora_entrada','onkeyup' => "validar_hora(this)", 'onblur' => "validar_hora(this)", 'required' => 'required','autofocus'=>'autofocus'])); ?>

            <div class="invalid-feedback" style="display:none">
               Es necesario ingresar una hora 
            </div>
         </div>
         <div class="col">
            <?php echo e(Form::label('hora_salida', 'Hora Salida')); ?>

            <?php echo e(Form::time('hora_salida',null,['class' => 'form-control', 'id'=>'hora_salida','onkeyup' => "validar_hora(this)", 'onblur' => "validar_hora(this)", 'required' => 'required','autofocus'=>'autofocus'])); ?>

            <div class="invalid-feedback" style="display:none">
               Es necesario ingresar una hora 
            </div>
         </div>
     </div>

    </div>


 <br>
 <ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit', 'disabled'])); ?>

</ol>


</form>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/validar-form-turnos.js')); ?>"></script>
<?php $__env->stopSection(); ?>




<?php /**PATH E:\Documentos\GitHub\roles\resources\views/turnos/form.blade.php ENDPATH**/ ?>
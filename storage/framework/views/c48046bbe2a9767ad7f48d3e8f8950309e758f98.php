<?php echo csrf_field(); ?>



<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos del Periodo
</div>

<form id="formulario">

    <div class="row">
       <div class="col">
         <?php echo e(Form::label('nombre_periodo', 'Nombre')); ?>

         <?php echo e(Form::text('nombre_periodo',null,['class' => 'form-control', 'id'=>'nombre_periodo','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'onkeyup' => "validar_string(this)", 'placeholder' => 'Debe colocar un nombre correspondiente al periodo', 'required' => 'required','autofocus'=>'autofocus'])); ?>

         <div class="invalid-feedback" style="display:none">
          El nombre no debe comenzar con números ni caracteres especiales
        </div>
       </div>
       <div class="col">
         <?php echo e(Form::label('duracion', 'Duracion (Semanas)')); ?>

         <?php echo e(Form::text('duracion',null,['class' => 'form-control', 'id'=>'duracion','onkeyup' => "validar_numero(this)", 'onblur' => "validar_numero(this)",'placeholder' => 'Debe colocar la cantidad de semanas del periodo', 'required' => 'required','autofocus'=>'autofocus'])); ?>

         <div class="invalid-feedback" style="display:none">
          El numero debe estar entre 0 o 100
        </div>
       </div>

     </div>

     <div class="row">
         <div class="col">
            <?php echo e(Form::label('fecha_inicio', 'Fecha de Inicio')); ?>

            <?php echo e(Form::date('fecha_inicio',null,['class' => 'form-control', 'id'=>'fecha_inicio','onkeyup' => "validar_fecha(this)", 'onblur' => "validar_fecha(this)",'required' => 'required','autofocus'=>'autofocus'])); ?>

            <div class="invalid-feedback" style="display:none">
              Ingrese una fecha valida para la fecha de inicio
            </div>
         </div>
         <div class="col">
             <?php echo e(Form::label('fecha_fin', 'Fecha de Finalizacion')); ?>

            <?php echo e(Form::date('fecha_fin',null,['class' => 'form-control', 'id'=>'fecha_fin','onkeyup' => "validar_fecha(this)", 'onblur' => "validar_fecha(this)", 'required' => 'required','autofocus'=>'autofocus'])); ?>

            <div class="invalid-feedback" style="display:none">
              Ingrese una fecha valida para la fecha de fin
            </div>
         </div>
     </div>
 <br>
 <ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit', 'disabled'])); ?>

</ol>


</form>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/validar-form-periodo.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/periodos/form.blade.php ENDPATH**/ ?>
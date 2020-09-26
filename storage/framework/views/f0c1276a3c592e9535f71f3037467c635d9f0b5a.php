 
<link rel="stylesheet" href="css/estilos.css">
<?php echo csrf_field(); ?>



<hr>

<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos de plan de estudio
      </div>

<form id="formulario">


        <div class="row">
           <div class="col">
             <?php echo e(Form::label('nombre_plan', 'Nombre de Plan')); ?>

              <?php echo e(Form::text('nombre_plan',null,['class' => 'form-control', 'id' => 'nombre_plan', 'onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Nombre del plan de estudio', 'required' => 'required','autofocus'=>'autofocus'])); ?>

              <div class="invalid-feedback" style="display:none">
                El nombre no debe comenzar con números ni caracteres especiales
            </div> 


             </div>
               <div class="col">
                <?php echo e(Form::label('duracion', 'Duracion')); ?>

                <?php echo e(Form::text('duracion',null,['class' => 'form-control', 'id' => 'duracion', 'onkeyup' => "validar_numero(this)", 'onblur' => "validar_numero(this)", 'placeholder' => 'Debe colocar la duración del plan ', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                  El numero debe estar entre 0 o 100
                </div>
                </div>
                

        </div>

        <br>

<ol class="float-sm-right">
  <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success', 'id' => 'btn_submit', 'disabled'])); ?>

  
   
</ol>

</form>


<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/validar-form-planes.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php /**PATH E:\Documentos\GitHub\roles\resources\views/planesEstudio/form.blade.php ENDPATH**/ ?>
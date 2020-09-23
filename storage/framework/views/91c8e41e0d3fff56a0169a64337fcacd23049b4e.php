<?php echo csrf_field(); ?>



<div class="alert alert-primary" role="alert">
        Datos de la Matrícula
</div>

<form  id="formulario" >

    <div class="row">
       	<?php echo e(Form::label('nombre', 'Nombre')); ?>

        <?php echo e(Form::text('nombre',null,['class' => 'form-control', 'id'=> 'nombre', 'onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Agregar un nombre alusivo a un matricula', 'required' => 'required','autofocus'=>'autofocus'])); ?>

        <div class="invalid-feedback" style="display:none">
            El nombre no debe comenzar con números ni caracteres especiales
          </div>
    </div>

    <div class="row">
        <?php echo e(Form::label('descripcion', 'Descripción')); ?>

        <?php echo e(Form::text('descripcion',null,['class' => 'form-control', 'id' => 'descripcion','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Debe colocar una descripción de la matricula', 'required' => 'required','autofocus'=>'autofocus'])); ?>

        <div class="invalid-feedback" style="display:none">
            El nombre no debe comenzar con números ni caracteres especiales
          </div>
     </div>
 <br>
 <ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit', 'disabled'])); ?>

</ol>


</form>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/validar-form-matriculas.js')); ?>"></script>
<?php $__env->stopSection(); ?><?php /**PATH E:\Documentos\GitHub\roles\resources\views/matriculas/form.blade.php ENDPATH**/ ?>
<?php echo csrf_field(); ?>



<div class="alert alert-primary" role="alert">
        Datos de la Matrícula
</div>

<form>

    <div class="row">
       	<?php echo e(Form::label('nombre', 'Nombre')); ?>

        <?php echo e(Form::text('nombre',null,['class' => 'form-control'])); ?>

    </div>

    <div class="row">
        <?php echo e(Form::label('descripcion', 'Descripción')); ?>

        <?php echo e(Form::text('descripcion',null,['class' => 'form-control'])); ?>

     </div>
 <br>
 <ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>


</form>
<?php /**PATH C:\Users\IsraelErazo\Documents\roles\resources\views/matriculas/form.blade.php ENDPATH**/ ?>
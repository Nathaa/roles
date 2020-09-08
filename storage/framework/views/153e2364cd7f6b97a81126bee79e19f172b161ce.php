<?php echo csrf_field(); ?>



<div class="alert alert-primary" role="alert">
        Datos del Año
</div>

<form>

    <div class="row">
       <div class="col">
         <?php echo e(Form::label('nombre', 'año lectivo')); ?>

         <?php echo e(Form::text('nombre',null,['class' => 'form-control'])); ?>

       </div>
       <div class="col">
         <?php echo e(Form::label('duracion', 'Duracion (Semanas)')); ?>

         <?php echo e(Form::text('duracion',null,['class' => 'form-control'])); ?>

       </div>

     </div>


 <br>
 <ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>


</form>
<?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/anios/form.blade.php ENDPATH**/ ?>
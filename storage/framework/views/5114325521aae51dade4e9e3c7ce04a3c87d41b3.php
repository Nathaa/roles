<?php echo csrf_field(); ?>



<div class="alert alert-primary" role="alert">
        Datos del Periodo
</div>

<form>

    <div class="row">
       <div class="col">
         <?php echo e(Form::label('nombre', 'Nombre')); ?>

         <?php echo e(Form::text('nombre',null,['class' => 'form-control'])); ?>

       </div>
       <div class="col">
         <?php echo e(Form::label('duracion', 'Duracion (Semanas)')); ?>

         <?php echo e(Form::text('duracion',null,['class' => 'form-control'])); ?>

       </div>

     </div>

     <div class="row">
         <div class="col">
            <?php echo e(Form::label('fecha_inicio', 'Fecha de Inicio')); ?>

            <?php echo e(Form::date('fecha_inicio',null,['class' => 'form-control'])); ?>

         </div>
         <div class="col">
             <?php echo e(Form::label('fecha_fin', 'Fecha de Finalizacion')); ?>

            <?php echo e(Form::date('fecha_fin',null,['class' => 'form-control'])); ?>

         </div>
     </div>
 <br>
 <ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>


</form>





<?php /**PATH C:\Users\IsraelErazo\Documents\roles\resources\views/periodos/form.blade.php ENDPATH**/ ?>
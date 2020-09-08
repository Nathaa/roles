<?php echo csrf_field(); ?>



<hr>

<div class="alert alert-primary" role="alert">
        Datos de plan de estudio
      </div>

<form>


        <div class="row">
           <div class="col">
             <?php echo e(Form::label('nombre_plan', 'Nombre de Plan')); ?>

              <?php echo e(Form::text('nombre_plan',null,['class' => 'form-control'])); ?>


             </div>
               <div class="col">
                <?php echo e(Form::label('duracion', 'Duracion')); ?>

                <?php echo e(Form::text('duracion',null,['class' => 'form-control'])); ?>

                </div>

        </div>

        <br>

<ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>



</form>


<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/planesEstudio/form.blade.php ENDPATH**/ ?>
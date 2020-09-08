<?php echo csrf_field(); ?>



<hr>

<div class="alert alert-primary" role="alert">
        Datos de grado
      </div>

<form>


        <div class="row">
           <div class="col">
             <?php echo e(Form::label('grado', 'Grado')); ?>

              <?php echo e(Form::text('grado',null,['class' => 'form-control'])); ?>


             </div>
               <div class="col">
                <?php echo e(Form::label('seccion', 'Seccion')); ?>

                <?php echo e(Form::text('seccion',null,['class' => 'form-control'])); ?>

                </div>
                <div class="col">
                <?php echo e(Form::label('categoria', 'Categoria')); ?>

                <?php echo e(Form::text('categoria',null,['class' => 'form-control'])); ?>

              </div>
        </div>

<br>
<ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>



</form>


<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/grados/form.blade.php ENDPATH**/ ?>
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
                    <?php echo e(Form::label('anios_id', 'Año')); ?>

                    <?php echo e(Form::text('anios_id',null,['class' => 'form-control'])); ?>

                    </div>



        </div>

        <div class="col">


<br>
        <div class="row">
            <div class="col">
                <?php echo e(Form::label('categoria', 'Categoria')); ?>


                <br>

<input type="radio" name="categoria" id="categoria" value="Tercer Ciclo">Tercer Ciclo<br>
<input type="radio" name="categoria" id="categoria" value="Bachillerato General">Bachillerato General<br>
<input type="radio" name="categoria" id="categoria" value="Bachillerato Vocacional">Bachillerato Vocacional<br>

              </div>
            </div>

<br>
<ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>



</form>



<?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/grados/form.blade.php ENDPATH**/ ?>
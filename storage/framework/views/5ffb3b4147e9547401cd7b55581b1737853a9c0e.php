<?php echo csrf_field(); ?>





</div>

<hr>

<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos Asignacion Docente-Grado
</div>


<form id="formulario">

        <div class="row">

                    <div class="col">
                    <div class="form-group">
            <?php echo Form::label('docentes_id', 'Seleccione el Docente'); ?>

            <div class="form-group">
                <select name="docentes_id" id= "docentes_id" class="form-control" onblur="validar_select(this)" required autofocus>
                    <option value="">--Docentes--</option>
                    <?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($docente->id); ?>"> <?php echo e($docente->nombre); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback" style="display:none">
                  El Docente no debe quedar vacío.
               </div>
            </div>
        </div>
                   </div>



                <div class="col">
                <div class="form-group">
            <?php echo Form::label('asignacions_id', 'Seleccione La asignacion'); ?>

            <div class="form-group">
                <select name="asignacions_id" id= "asignacions_id" class="form-control" onblur="validar_select(this)" required autofocus>
                    <option value="">--Asignaciones--</option>

                    <?php $__currentLoopData = $asignaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($asignacion->id); ?>">
                        <?php echo e($asignacion->grado); ?><?php echo e($asignacion->seccion); ?>


                      </option>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback" style="display:none">
                   no debe quedar vacío.
               </div>
            </div>
        </div>
                </div>
                    <div class="col">
                    <div class="form-group">
            <?php echo Form::label('anios_id', 'Seleccione el Año'); ?>

            <div class="form-group">
                <select name="anios_id" id= "anios_id" class="form-control" onblur="validar_select(this)" required autofocus>
                    <option value="">--Años--</option>
                    <?php $__currentLoopData = $anios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($anio->id); ?>"> <?php echo e($anio->año); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback" style="display:none">
                  El Año no debe quedar vacío.
               </div>
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
<script type="">
        $(function(){
             $("#fecha_nacimiento").on('change', calcularEdad);
         });

         function calcularEdad() {

             fecha_nacimiento = $(this).val();
             var fecha_hoy = new Date();
             var cumpleanos = new Date(fecha_nacimiento);
             var edad = fecha_hoy.getFullYear() - cumpleanos.getFullYear();
             var m = fecha_hoy.getMonth() - cumpleanos.getMonth();

             if (m < 0 || (m === 0 && fecha_hoy.getDate() < cumpleanos.getDate())) {
                 edad--;
             }
             $("#edad").val(edad);
         }
</script>
<script src="<?php echo e(asset('js/validar-form-docente.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php /**PATH E:\Documentos\GitHub\roles\resources\views/docentegrados/form.blade.php ENDPATH**/ ?>
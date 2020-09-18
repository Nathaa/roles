<?php echo csrf_field(); ?>


<div class="row">
        <div class="col">
           <label>Imagen</label>

           <br><input type="file" name="imagen" class="form-control-file" class="text-rigth">
        </div>


</div>
<hr>

<div class="alert alert-primary" role="alert">
        Datos Personales Alumnas
</div>


<form>


        <div class="row">
           <div class="col">
             <?php echo e(Form::label('nombre', 'Nombre')); ?>

              <?php echo e(Form::text('nombre',null,['class' => 'form-control'])); ?>


             </div>
               <div class="col">
                <?php echo e(Form::label('apellido', 'Apellidos')); ?>

                <?php echo e(Form::text('apellido',null,['class' => 'form-control'])); ?>

                </div>
                <div class="col">
                <?php echo e(Form::label('fecha_nacimiento', 'Fecha Nacimiento')); ?>

                <?php echo e(Form::date('fecha_nacimiento',null,['class' => 'form-control'])); ?>

              </div>
        </div>

        <div class="row">
                <div class="col">
                        <?php echo e(Form::label('edad', 'Edad')); ?>

                        <?php echo e(Form::text('edad',null,['class' => 'form-control',  'readonly' => 'true'])); ?>

                  </div>
                    <div class="col">
                        <?php echo e(Form::label('direccion', 'Direccion')); ?>

                        <?php echo e(Form::text('direccion',null,['class' => 'form-control'])); ?>

                   </div>


        </div>
     <hr>
     <div class="alert alert-primary" role="alert">
        Datos Personales del Responsable
      </div>
        <div class="row">
                <div class="col">
                        <?php echo e(Form::label('encargado', 'Encargado')); ?>

                        <?php echo e(Form::text('encargado',null,['class' => 'form-control'])); ?>


               </div>
                 <div class="col">
                        <?php echo e(Form::label('parentesco', 'Parentesco')); ?>

                        <?php echo e(Form::text('parentesco',null,['class' => 'form-control'])); ?>

                </div>
                <div class="col">
                        <?php echo e(Form::label('telefono_emergencia', 'Telefono de encargado')); ?>

                        <?php echo e(Form::text('telefono_emergencia',null,['class' => 'form-control'])); ?>

                </div>

     </div>
     <hr>
     <div class="alert alert-primary" role="alert">
        Enfermedades
      </div>

     <div class="row">
        <div class="col">
            <?php echo Form::label('padecimientos', 'Padecimientos'); ?>

            <div class="col">
                <select name="padecimientos" id= "padecimientos" class="form-control" required>
                    <option value="">--------- ¿Tiene  algun Padecimiento? ---------</option>
                    <?php $__currentLoopData = $arrayPadecimiento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arreglo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($arreglo); ?>"> <?php echo e($arreglo); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>

         <div class="col">
                <?php echo e(Form::label('descripcion_padecimiento', 'Descripcion Padecimiento')); ?>

                <?php echo e(Form::text('descripcion_padecimiento',null,['class' => 'form-control'])); ?>

        </div>
        <div class="col">
                <?php echo e(Form::label('alergia_medicamento', 'Alergias del algun medicamento')); ?>

                <?php echo e(Form::text('alergia_medicamento',null,['class' => 'form-control'])); ?>

        </div>

</div>

<hr>
     <div class="alert alert-primary" role="alert">
        Datos Personales de Padres
      </div>

<div class="row">
        <div class="col">
                <?php echo e(Form::label('nombre_padre', 'Nombre padre')); ?>

        <?php echo e(Form::text('nombre_padre',null,['class' => 'form-control'])); ?>


       </div>
         <div class="col">
                <?php echo e(Form::label('profesion_padre', 'Profesion padre')); ?>

                <?php echo e(Form::text('profesion_padre',null,['class' => 'form-control'])); ?>

        </div>
        <div class="col">
                <?php echo e(Form::label('telefono_padre', 'Telefono padre')); ?>

                <?php echo e(Form::text('telefono_padre',null,['class' => 'form-control'])); ?>

        </div>
</div>
<div class="row">
        <div class="col">
                <?php echo e(Form::label('nombre_madre', 'Nombre madre')); ?>

                <?php echo e(Form::text('nombre_madre',null,['class' => 'form-control'])); ?>

        </div>

         <div class="col">
                <?php echo e(Form::label('profesion_madre', 'Profesion Madre')); ?>

                <?php echo e(Form::text('profesion_madre',null,['class' => 'form-control'])); ?>

        </div>
        <div class="col">
                <?php echo e(Form::label('telefono_madre', 'Telefono madre')); ?>

                <?php echo e(Form::text('telefono_madre',null,['class' => 'form-control'])); ?>

        </div>

</div>

<br>
<ol class="float-sm-right">
   <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

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
<?php $__env->stopSection(); ?>
<?php /**PATH E:\Documentos\GitHub\roles\resources\views/estudiantes/form.blade.php ENDPATH**/ ?>
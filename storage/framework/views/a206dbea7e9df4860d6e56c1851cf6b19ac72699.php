<?php echo csrf_field(); ?>



<hr>

<div class="alert alert-primary" role="alert">
        Datos Docente
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
              <div class="col">
                <?php echo e(Form::label('telefono', 'Núm. Teléfono con Guión')); ?>

                <?php echo e(Form::text('telefono',null,['class' => 'form-control'])); ?>

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



                <div class="col">
                <?php echo e(Form::label('dui', 'DUI sin Guión')); ?>

                <?php echo e(Form::text('dui',null,['class' => 'form-control'])); ?>

                  </div>
                    <div class="col">
                        <?php echo e(Form::label('sexo', 'Sexo')); ?>

                        <div class="col">
                <select name="sexo" id= "sexo" class="form-control" required>
                    <option value=""> Sexo del docente </option>
                    <?php $__currentLoopData = $arraySexo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arreglo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($arreglo); ?>"> <?php echo e($arreglo); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
                   </div>



        </div>
        <div class="form-group">
            <?php echo Form::label('turnos_id', 'Seleccione el Turno'); ?>

            <div class="form-group">
                <select name="turnos_id" id= "turnos_id" class="form-control" required>
                    <option value="">--Turnos--</option>
                    <?php $__currentLoopData = $turnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($turno->id); ?>"> <?php echo e($turno->nombre_turno); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
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
<?php /**PATH E:\Documentos\GitHub\roles\resources\views/docentes/form.blade.php ENDPATH**/ ?>
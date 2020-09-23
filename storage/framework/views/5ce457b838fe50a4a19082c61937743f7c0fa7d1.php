<?php echo csrf_field(); ?>


<div class="row">
        <div class="col">
           <label>Imagen</label>

           <br><input type="file" name="imagen" class="form-control-file" class="text-rigth">
        </div>


</div>

<hr>

<div class="alert alert-primary" role="alert">
        Datos Docente
</div>


<form id="formulario">


        <div class="row">
           <div class="col">
             <?php echo e(Form::label('nombre', 'Nombre')); ?>

             <?php echo e(Form::text('nombre',null,['class' => 'form-control', 'id'=> 'nombre', 'onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Nombre del Docente', 'required' => 'required','autofocus'=>'autofocus'])); ?>

             <div class="invalid-feedback" style="display:none">
              El nombre no debe comenzar con numeros ni caracteres especiales
            </div>
             </div>
               <div class="col">
                <?php echo e(Form::label('apellido', 'Apellidos')); ?>

                <?php echo e(Form::text('apellido',null,['class' => 'form-control', 'id'=> 'apellido','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Apellidos del Docente', 'required' => 'required','autofocus' => 'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                  El apellido no debe comenzar con numeros ni caracteres especiales
                </div>
                </div>
                <div class="col">
                <?php echo e(Form::label('fecha_nacimiento', 'Fecha Nacimiento')); ?>

                <?php echo e(Form::date('fecha_nacimiento',null,['class' => 'form-control','id'=>'fecha_nacimiento','onkeyup' => "validar_fecha(this)", 'onblur' => "validar_fecha(this)", 'required' => 'required','autofocus'=>'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                 Agregar una fecha de nacimiento valida
                </div>
              </div>
              <div class="col">
                <?php echo e(Form::label('telefono', 'Núm. Teléfono con Guión')); ?>

                <?php echo e(Form::text('telefono',null,['class' => 'form-control', 'id'=>'telefono','onkeyup' => "validar_telefono(this)", 'onblur' => "validar_telefono(this)", 'placeholder' => '7777-7777', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                  El Teléfono se debe ingresar en un formato valido
                </div>
              </div>
        </div>

        <div class="row">
                <div class="col">
                        <?php echo e(Form::label('edad', 'Edad')); ?>

                        <?php echo e(Form::text('edad',null,['class' => 'form-control',  'readonly' => 'true', 'id' => 'edad','onkeyup' => "validar_edad(this)", 'onblur' => "validar_edad(this)"])); ?>

                  </div>
                    <div class="col">
                        <?php echo e(Form::label('direccion', 'Direccion')); ?>

                        <?php echo e(Form::text('direccion',null,['class' => 'form-control', 'id'=>'direccion','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Ingresar la dirección de donde vive', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                        <div class="invalid-feedback" style="display:none">
                          La direccion no debe comenzar con numeros ni caracteres especiales
                        </div>
                   </div>



                <div class="col">
                <?php echo e(Form::label('dui', 'DUI con Guión')); ?>

                <?php echo e(Form::text('dui',null,['class' => 'form-control', 'id'=>'dui','onkeyup' => "validar_dui(this)", 'onblur' => "validar_dui(this)", 'placeholder' => 'Ingresar Dui con guión', 'required' => 'required','autofocus'=>'autofocus' ])); ?>

                <div class="invalid-feedback" style="display:none">
                  El dui solo puede contener 9 caracteres y debe agregar el guión donde corresponda
                </div>
                </div>
                    <div class="col">
                        <?php echo e(Form::label('sexo', 'Sexo')); ?>

                      <div class="col">
                        <select name="sexo" id= "sexo" class="form-control" onblur="validar_select(this)" required autofocus>
                            <option value=""> Sexo del docente </option>
                            <?php $__currentLoopData = $arraySexo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arreglo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($arreglo); ?>"> <?php echo e($arreglo); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>
                       <div class="invalid-feedback" style="display:none">
                        El Sexo no debe quedar vacío.
                     </div>
                    </div>
                  </div>



        </div>
        <div class="form-group">
            <?php echo Form::label('turnos_id', 'Seleccione el Turno'); ?>

            <div class="form-group">
                <select name="turnos_id" id= "turnos_id" class="form-control" required autofocus>
                    <option value="">--Turnos--</option>
                    <?php $__currentLoopData = $turnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($turno->id); ?>"> <?php echo e($turno->nombre_turno); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
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
<?php /**PATH C:\Materias UES Damaris\Sistema_Oficial_CEFRAM\roles\resources\views/docentes/form.blade.php ENDPATH**/ ?>
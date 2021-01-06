<?php echo csrf_field(); ?>


<div class="row">
        <div class="col">
           <label>Imagen</label>

           <br><input type="file" name="imagen" class="form-control-file" class="text-rigth">
        </div>


</div>
<hr>

<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos Personales Alumnas
</div>


<form id="formulario">


        <div class="row">
           <div class="col">
             <?php echo e(Form::label('nombre', 'Nombre')); ?>

              <?php echo e(Form::text('nombre',null,['class' => 'form-control',  'id'=> 'nombre', 'onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Nombres de la Alumna', 'required' => 'required','autofocus'=>'autofocus'])); ?>

              <div class="invalid-feedback" style="display:none">
                El nombre no debe comenzar con numeros ni caracteres especiales
              </div>
             </div>
               <div class="col">
                <?php echo e(Form::label('apellido', 'Apellidos')); ?>

                <?php echo e(Form::text('apellido',null,['class' => 'form-control', 'id'=> 'apellido','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)",'placeholder' => 'Apellidos de la Alumna', 'required' => 'required','autofocus'=>'autofocus'])); ?>

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
        </div>

        <div class="row">
                <div class="col">
                        <?php echo e(Form::label('edad', 'Edad')); ?>

                        <?php echo e(Form::text('edad',null,['class' => 'form-control',  'readonly' => 'true'])); ?>

                  </div>
                    <div class="col">
                        <?php echo e(Form::label('direccion', 'Direccion')); ?>

                        <?php echo e(Form::text('direccion',null,['class' => 'form-control', 'id'=>'direccion','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Ingresar la dirección de donde vive', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                        <div class="invalid-feedback" style="display:none">
                                La dirección no debe comenzar con numeros ni caracteres especiales
                        </div>
                   </div>


        </div>
     <hr>
     <div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos Personales del Responsable
      </div>
        <div class="row">
                <div class="col">
                        <?php echo e(Form::label('encargado', 'Encargado')); ?>

                        <?php echo e(Form::text('encargado',null,['class' => 'form-control', 'id'=>'encargado','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)",'placeholder' => 'Nombre del Encargado', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                        <div class="invalid-feedback" style="display:none">
                                El campo encargado no debe comenzar con numeros ni caracteres especiales
                        </div>

               </div>
                 <div class="col">
                        <?php echo e(Form::label('parentesco', 'Parentesco')); ?>

                        <?php echo e(Form::text('parentesco',null,['class' => 'form-control','id'=>'parentesco','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)",'placeholder' => 'Parentesco con la Alumna', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                        <div class="invalid-feedback" style="display:none">
                                El campo parentesco no debe comenzar con numeros ni caracteres especiales
                        </div>
                </div>
                <div class="col">
                        <?php echo e(Form::label('telefono_emergencia', 'Telefono de encargado')); ?>

                        <?php echo e(Form::text('telefono_emergencia',null,['class' => 'form-control', 'id'=>'telefono_emergencia','onkeyup' => "validar_telefono(this)", 'onblur' => "validar_telefono(this)", 'placeholder' => 'Formato valido : 7777-7777', 'autofocus' => 'autofocus', 'required' => 'required'])); ?>

                        <div class="invalid-feedback" style="display:none">
                                El Teléfono se debe ingresar en un formato valido
                        </div>
                </div>

     </div>
     <hr>
     <div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Enfermedades
      </div>

     <div class="row">
        <div class="col">
            <?php echo Form::label('padecimientos', 'Padecimientos'); ?>

            <div class="col">
                <select name="padecimientos" id= "padecimientos" class="form-control" onblur="validar_select(this)" required autofocus>
                    <option value="">--------- ¿Tiene  algun Padecimiento? ---------</option>
                    <?php $__currentLoopData = $arrayPadecimiento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arreglo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($arreglo); ?>"> <?php echo e($arreglo); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback" style="display:none">
                        El campo Padecimiento no debe quedar vacío.
                </div>
          </div>
        </div>

         <div class="col">
                <?php echo e(Form::label('descripcion_padecimiento', 'Descripcion Padecimiento')); ?>

                <?php echo e(Form::text('descripcion_padecimiento',null,['class' => 'form-control','id'=>'descripcion_padecimiento','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Pequeña descripción del padecimiento', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                        La descripcion del Padecimiento no debe comenzar con numeros ni caracteres especiales.
                </div>
        </div>
        <div class="col">
                <?php echo e(Form::label('alergia_medicamento', 'Alergias del algun medicamento')); ?>

                <?php echo e(Form::text('alergia_medicamento',null,['class' => 'form-control','id'=>'alergia_medicamento','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)",'placeholder' => 'Si tiene alergia algun medicamento', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                        El campo alergia medicamento no debe comenzar con numeros ni caracteres especiales.
                </div>
        </div>

</div>

<hr>
     <div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos Personales de Padres
      </div>

<div class="row">
        <div class="col">
                <?php echo e(Form::label('nombre_padre', 'Nombre padre')); ?>

                <?php echo e(Form::text('nombre_padre',null,['class' => 'form-control','id'=>'nombre_padre','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)",'placeholder' => 'Nombre Completo del Padre', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                        El campo nombre de padre no debe comenzar con numeros ni caracteres especiales.
                </div>
       </div>
         <div class="col">
                <?php echo e(Form::label('profesion_padre', 'Profesion padre')); ?>

                <?php echo e(Form::text('profesion_padre',null,['class' => 'form-control', 'id'=>'profesion_padre','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Profesión u Oficio del Padre', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                        El campo profesión padre no debe comenzar con numeros ni caracteres especiales.
                </div>
        </div>
        <div class="col">
                <?php echo e(Form::label('telefono_padre', 'Telefono padre')); ?>

                <?php echo e(Form::text('telefono_padre',null,['class' => 'form-control','id'=>'telefono','onkeyup' => "validar_telefono(this)", 'onblur' => "validar_telefono(this)",'placeholder' => 'Formato valido : 7777-7777', 'autofocus' => 'autofocus', 'required' => 'required'])); ?>

                <div class="invalid-feedback" style="display:none">
                        El Teléfono se debe ingresar en un formato valido
                </div>
        </div>
</div>
<div class="row">
        <div class="col">
                <?php echo e(Form::label('nombre_madre', 'Nombre madre')); ?>

                <?php echo e(Form::text('nombre_madre',null,['class' => 'form-control','id'=>'nombre_madre','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Nombre Completo de la Madre', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                        El campo nombre de madre no debe comenzar con numeros ni caracteres especiales.
                </div>
        </div>

         <div class="col">
                <?php echo e(Form::label('profesion_madre', 'Profesion Madre')); ?>

                <?php echo e(Form::text('profesion_madre',null,['class' => 'form-control', 'id'=>'profesion_madre','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)",'placeholder' => 'Profesión u Oficio de la Madre', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                        El campo profesión madre no debe comenzar con numeros ni caracteres especiales.
                </div>
        </div>
        <div class="col">
                <?php echo e(Form::label('telefono_madre', 'Telefono madre')); ?>

                <?php echo e(Form::text('telefono_madre',null,['class' => 'form-control','id'=>'telefono','onkeyup' => "validar_telefono(this)", 'onblur' => "validar_telefono(this)",'placeholder' => 'Formato valido : 7777-7777', 'autofocus' => 'autofocus', 'required' => 'required'])); ?>

                <div class="invalid-feedback" style="display:none">
                        El Teléfono se debe ingresar en un formato valido
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

         //agregado para cambiar el valor del select por el recuperado de la base 
         $(document).ready(function(){
            $(function printOnSelect(){
              //si el formulario va a ser utilizado para editar mandara 1 en una bandera, si el formulario sera utilizado para crear , mandara 0
              var flag=<?php echo json_encode($flag ?? ''); ?>;
              if(flag){
                var arrayPadecimiento=<?php echo json_encode($arrayPadecimiento ??''); ?>;
                var padecimiento = <?php echo json_encode($padecimiento ??''); ?>; 
                  for(var i=0;i<arrayPadecimiento.length;i++){
                        if(padecimiento===arrayPadecimiento[i]){
                      //console.log(arrayPadecimiento[i]);
                      document.getElementById("padecimientos").value = arrayPadecimiento[i];
                    }
                  }
              }
            });
          });
          //hasta aqui lo nuevo
</script>
<script src="<?php echo e(asset('js/validar-form-estudiante.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/estudiantes/form.blade.php ENDPATH**/ ?>
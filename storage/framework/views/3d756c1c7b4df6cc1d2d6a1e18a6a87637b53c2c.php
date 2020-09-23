<?php echo csrf_field(); ?>



<hr>

<div class="alert alert-primary" role="alert">
        Datos de grado
      </div>

<form id="formulario">


        <div class="row">
           <div class="col">
             <?php echo e(Form::label('grado', 'Grado')); ?>

              <?php echo e(Form::text('grado',null,['class' => 'form-control', 'id'=>'grado','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)",'placeholder' => 'Nombre del grado', 'required' => 'required','autofocus'=>'autofocus'])); ?>

              <div class="invalid-feedback" style="display:none">
                El nombre del grado no debe comenzar con números ni caracteres especiales
              </div> 
             </div>
               <div class="col">
                <?php echo e(Form::label('seccion', 'Seccion')); ?>

                <?php echo e(Form::text('seccion',null,['class' => 'form-control', 'id'=>'seccion','onkeyup' => "validar_seccion(this)", 'onblur' => "validar_seccion(this)", 'placeholder' => '"B", "b"', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                  Debe agregar a la sección,por ejemplo B,b entre comillas dobles
                </div>
                </div>
            <div class="col">
                <?php echo e(Form::label('categoria', 'Categoria')); ?>

                <?php echo e(Form::text('categoria',null,['class' => 'form-control', 'id'=>'categoria','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Por ejemplo, Bachillerato', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                  Debe agreagar la categoria del grado
                </div>
              
            </div>

            <div>
                <?php echo e(Form::label('capacidad', 'Capacidad')); ?>

                <?php echo e(Form::text('capacidad',null,['class' => 'form-control', 'id' => 'capacidad','onkeyup' => "validar_numero(this)", 'onblur' => "validar_numero(this)", 'placeholder' => 'Capacidad de alumnas por grado', 'required' => 'required','autofocus'=>'autofocus'])); ?>

                <div class="invalid-feedback" style="display:none">
                   Solo debe agregar números al campo capacidad
                </div>
            </div>
                <div class="col">
                    <div class="form-group">
                        <?php echo Form::label('anios_id', 'Seleccione el Año'); ?>

                        <div class="form-group">
                            <select name="anios_id" id= "anios_id" class="form-control" onblur="validar_select(this)" required autofocus>
                                <option value="">--Año--</option>
                                <?php $__currentLoopData = $anios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($anio->id); ?>"> <?php echo e($anio->año); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="invalid-feedback" style="display:none">
                                El campo Año no debe quedar vacío.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col">


<br>
            <div class="row">
               <div class="col">
                <div class="form-group">
                    <?php echo Form::label('plan_estudios_id', 'Seleccione el Plan de Estudio'); ?>

                    <div class="form-group">
                        <select name="plan_estudios_id" id= "plan_estudios_id" class="form-control" onblur="validar_select(this)" required autofocus>
                            <option value="">--Plan de Estudio--</option>
                            <?php $__currentLoopData = $planesEstudio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planEstudio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($planEstudio->id); ?>"> <?php echo e($planEstudio->nombre_plan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="invalid-feedback" style="display:none">
                            El campo Plan de estudios no debe quedar vacío.
                        </div>
                    </div>
                </div>
               </div>

                <br>
                <div class="col">
                    <div class="form-group">
                        <?php echo Form::label('turnos_id', 'Seleccione el Turno'); ?>

                        <div class="form-group">
                            <select name="turnos_id" id= "turnos_id" class="form-control"  onblur="validar_select(this)" required autofocus>
                                <option value="">--Turnos--</option>
                                <?php $__currentLoopData = $turnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($turno->id); ?>"> <?php echo e($turno->nombre_turno); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="invalid-feedback" style="display:none">
                                El campo Turnos no debe quedar vacío.
                            </div>
                        </div>
                    </div>
                </div>
            </div>




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
<br>
<br>
<br>
<br>
<ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit', 'disabled'])); ?>

</ol>



</form>


<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/validar-form-grados.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php /**PATH C:\Materias UES Damaris\Sistema_Oficial_CEFRAM\roles\resources\views/grados/form.blade.php ENDPATH**/ ?>
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
                    <?php echo e(Form::label('capacidad', 'Capacidad')); ?>

                    <?php echo e(Form::text('capacidad',null,['class' => 'form-control'])); ?>

                    </div>
                <div class="col">
                    <div class="form-group">
                        <?php echo Form::label('anios_id', 'Seleccione el Año'); ?>

                        <div class="form-group">
                            <select name="anios_id" id= "anios_id" class="form-control" required>
                                <option value="">--Año--</option>
                                <?php $__currentLoopData = $anios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($anio->id); ?>"> <?php echo e($anio->año); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                   </div>



        </div>

        <div class="col">


<br>
        </br>
            <div class="row">
               <div class="col">
                <div class="form-group">
                    <?php echo Form::label('plan_estudios_id', 'Seleccione el Plan de Estudio'); ?>

                    <div class="form-group">
                        <select name="plan_estudios_id" id= "plan_estudios_id" class="form-control" required>
                            <option value="">--Plan de Estudio--</option>
                            <?php $__currentLoopData = $planesEstudio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planEstudio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($planEstudio->id); ?>"> <?php echo e($planEstudio->nombre_plan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
               </div>
                <br>
                <div class="col">
                    <div class="form-group">
                        <?php echo Form::label('docentes_id', 'Seleccione el Docente'); ?>

                        <div class="form-group">
                            <select name="docentes_id" id= "docentes_id" class="form-control" required>
                                <option value="">--Docentes--</option>
                                <?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($docente->id); ?>"> <?php echo e($docente->nombre); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col">
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
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>



</form>



<?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/grados/form.blade.php ENDPATH**/ ?>
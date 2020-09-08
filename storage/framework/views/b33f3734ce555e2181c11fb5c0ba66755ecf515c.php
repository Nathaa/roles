<?php echo csrf_field(); ?>



<div class="alert alert-primary" role="alert">
        Datos del Turno
</div>

<form>

    <div class="row">
      <div class="col">
         <?php echo e(Form::label('nombre_turno', 'Turno')); ?>

            <select name="nombre_turno" class="form-control"  required autofocus>
              <option value="">Seleccione un Turno</option>
                <?php $__currentLoopData = $arrayTurno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $array): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($array); ?>"> <?php echo e($array); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

       <div class="col-16">
         <?php echo e(Form::label('hora_entrada', 'Hora de Entrada')); ?><br>
         <?php echo e(Form::time('hora_entrada', Carbon\Carbon::now()->isoFormat('H:mm:ss A')),['class' => 'form-control', 'required autofocus']); ?>

        </div>

        <div class="col-16">
           <?php echo e(Form::label('hora_salida', 'Hora de Salida')); ?><br>
           <?php echo e(Form::time('hora_salida', Carbon\Carbon::now()->isoFormat('H:mm:ss A')),['class' => 'form-control', 'required autofocus']); ?>

        </div>
     </div>


 <br>
 <ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>


</form>





<?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/turnos/form.blade.php ENDPATH**/ ?>
<?php echo csrf_field(); ?>



<div class="alert alert-primary" role="alert">
        Datos del Año
</div>

<form>



    <div class="row">
        <div class="col">
                            <select name="grados_id" id="grados_id" class="form-control" >
                                <option value="">Seleccione Grado</option>
                                <?php $__currentLoopData = $grados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                           <option value="<?php echo e($grado->id); ?>",null>
                                              <?php echo e($grado->grado); ?><?php echo e($grado->seccion); ?>


                                            </option>

                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                </select>

        </div>

        <div class="col">
            <div class="form-group">
                <ul class="list-unstyled">
                <?php echo e(Form::label('periodos_id','Periodos')); ?>

                <div>
                 <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <label>
         <?php echo e(Form::checkbox('periodos[]',$periodo->id)); ?>

          <?php echo e($periodo->nombre); ?>

        </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
         </div>
        </div>
    </div>
<br>
<br>
    <div class="form-group">


        <?php echo e(Form::label('materias_id','Materias')); ?>

        <div>

         <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<label>
 <?php echo e(Form::checkbox('materias[]',$materia->id)); ?>

  <?php echo e($materia->nombre); ?>

</label>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
 </div>

</div>










 <br>
 <ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>


</form>

<?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/asignaciones/form.blade.php ENDPATH**/ ?>
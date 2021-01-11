<?php echo csrf_field(); ?>



<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
    Asignacion Academica
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


    </div>
<br>
<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
    Periodos
</div>
<div class="col">
    <div class="form-group">
        <ul class="list-unstyled">

         <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<label><?php echo e($periodo->nombre_periodo); ?></label>
<input type="checkbox" id="periodo[]" name="periodo[]" value="<?php echo e($periodo->id); ?>">

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
 </div>
</div>



<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
    Materias
</div>

         <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="checkbox col-sm-6">

 <input type="checkbox" id="materia[]" name="materia[]" value="<?php echo e($materia->id); ?>">
 <label><?php echo e($materia->nombre); ?></label>
         </div>

 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
 </div>












 <br>
 <ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>


</form>

<?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/asignaciones/form.blade.php ENDPATH**/ ?>
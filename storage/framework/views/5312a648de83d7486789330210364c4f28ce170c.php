

<?php echo csrf_field(); ?>



<div class="alert alert-primary" role="alert">
Nueva Planificacion Academica
</div>

<form>

    <div style="float:left;width:50%;">

    <div class="row">
        <div class="col">


            <option value="">Seleccione Grado</option>
            <hr>

                                <select name="grados_id" size=6 id="grados_id" class="form-control" >

                                    <?php $__currentLoopData = $grados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <option value="<?php echo e($grado->id); ?>",null>
                                       <?php echo e($grado->grado); ?><?php echo e($grado->seccion); ?>


                                     </option>

                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>

        </div>

        <div class="col">
            <div class="form-group">
                <ul class="list-unstyled">
                <?php echo e(Form::label('periodos_id','Periodos')); ?>

                <hr>
                <div>
                    <ul class="list-unstyled">
                 <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($periodo->nombre_periodo); ?>

        <input type="checkbox" id="periodo[]" name="periodo[]" value="<?php echo e($periodo->id); ?>">

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
         </div>
        </div>
    </div>

    </div>
</form>
<br>

<hr>

    <div class="form-group">
        <br>
        <ul class="list-unstyled">
        <?php echo e(Form::label('materias_id','Materias')); ?>

        <hr>

        <div>

         <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <?php echo e($materia->nombre); ?>

 <input type="checkbox" id="materia[]" name="materia[]" value="<?php echo e($materia->id); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 </div>
</ul>
</div>










 <br>
 <ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>


</form>
<?php /**PATH E:\Documentos\GitHub\roles\resources\views/asignaciones/form.blade.php ENDPATH**/ ?>
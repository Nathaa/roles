<?php $__env->startSection('title'); ?>
<h5><strong></strong> </h5>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="<?php echo e(route('asignaciones.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">

       <div class="card-body">
        <table class="table table-bordered table-hover">

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>




                    <div id="msj_azul_fijo" class="alert alert-primary" role="alert">
                        Asignacion Academica
                </div>

<form>

    <div class="row">
        <div class="col">
                            <select name="grados_id" id="grados_id" class="form-control" disabled="disabled" >
                                <option value="">Seleccione Grado</option>
                                <?php $__currentLoopData = $grados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                           <option value="<?php echo e($grado->id); ?>",null <?php $__currentLoopData = $grad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php  if($g->grados_id == $grado->id) { ?> selected  <?php } ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
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

            <div>
             <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <label><?php echo e($periodo->nombre_periodo); ?></label>
    <input disabled="disabled" type="checkbox" id="periodo[]" name="periodo[]" value="<?php echo e($periodo->id); ?>" <?php $__currentLoopData = $asignaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php  if($asignacion->periodos_id == $periodo->id) { ?> checked <?php } ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
     </div>
    </div>

<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
    Materias
</div>


         <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="checkbox col-sm-6">

 <input disabled="disabled" type="checkbox" id="materia[]" name="materia[]" value="<?php echo e($materia->id); ?>" <?php $__currentLoopData = $asignaciones2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignacion2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php  if($asignacion2->materias_id == $materia->id) { ?> checked <?php } ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
 <label><?php echo e($materia->nombre); ?></label>
</div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>













 <br>



</form>
                </table>

        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/asignaciones/show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h4>Asignar las notas para la materia: <strong><?php echo e($materias[0]->nombre); ?></strong>  <br>Grado: <strong> <?php echo e($grados[0]->grado); ?> <?php echo e($grados[0]->seccion); ?> <?php echo e($grados[0]->categoria); ?> </strong></h4>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="container-fluid">
    <div class="card">
      <div class="card-header">
<div class="container">
    <div class="container-fluid">
        <h4><strong>Seleccione el periodo deseado y de click en el boton siguiente</strong></h4>
        <form  action="<?php echo e(route('notas.notasPeriodo', ['nombreMateria'=>$materias[0]->nombre,
            'idMateria'=>$materias[0]->id,
            'gradoGrado'=> $grados[0]->grado,
             'categoriaGrado'=>$grados[0]->categoria,
             'idGrado'=>$grados[0]->id,
             'seccionGrado'=> $grados[0]->seccion,
             'numperiodos'=>$numperiodos,
             'anioID'=>$anioId[0]->id])); ?>" method="POST"  >
            <?php echo csrf_field(); ?>
        <br>
        <?php for($i=0; $i<$numperiodos;$i++): ?>
        <input type="radio" name="periodo" id="periodo" value="<?php echo e($periodos[$i]->periodos_id); ?>"> Notas para el periodo <?php echo e($i+1); ?><br>

        <?php endfor; ?>
      <br>
      <button type="submit" class="btn  btn-success float-sm-left" id="btnContinuar">Siguiente</button>
    </form>
    </div>
</div>

      </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/notas/ingresoNotas.blade.php ENDPATH**/ ?>
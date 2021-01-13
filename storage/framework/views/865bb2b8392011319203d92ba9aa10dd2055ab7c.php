<?php $__env->startSection('title'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h4>Asistencia y Conducta de las Estudiantes: <br> Periodo: <strong> <?php echo e($nomperiodo); ?></strong><br> Materia: <strong><?php echo e($nomMateria); ?></strong>  <br>Grado: <strong> <?php echo e($grado); ?> <?php echo e($seccion); ?> <?php echo e($categoria); ?> </strong></strong></h4>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="container-fluid">
<div class="container">

    <div class="container-fluid">

<br>
        <tr>
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="<?php echo e(route('notas.confignotas')); ?>"><i class="fa fa-align-justify"></i> Listado Materias en curso</a>
                </div>
              </div>
         <table class="table" id="tablaprueba">

            <tr class="thead-dark">
                <th scope="col" >Nombres Estudiante</th>
                <th scope="col">Apellidos Estudiante</th>
                <?php $i=0;?>
                <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <?php
                    if($notasCount==0){

                    }else{
                    if (str_contains($notas[$i]->estudiantes_id, $estudiante[$i]->id)) {
                        echo  "<th>Conducta: </th>";
                        echo  "<th>Asistencia:<br> </th>";
                    }}?>

                <?php $i++;?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




            </tr>

            <tbody>
                <?php $i=0;?>
                <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th>
                        <?php echo e($estudiante[$i]->nombre); ?>

                    </th>
                    <th>
                        <?php echo e($estudiante[$i]->apellido); ?>

                    </th>




                    <?php
                    if($notasCount==0){

                        }else{ if (str_contains($notas[$i]->estudiantes_id, $estudiante[$i]->id)) {
                        echo  "<th>";  echo $notas[$i]->conducta;  echo "<br> </th>";
                        echo  "<th>";  echo $notas[$i]->asistencia;  echo "<br> </th>";
                    }}?>


                </tr>
                <?php $i++;?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

          </tr>
      <br>

    </div>
</div>
      </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IsraelErazo\Desktop\Proyecto\roles\resources\views/notas/verAsistenciaConducta.blade.php ENDPATH**/ ?>
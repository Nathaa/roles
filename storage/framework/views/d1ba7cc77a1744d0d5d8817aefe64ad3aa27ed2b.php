<?php $__env->startSection('title'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h4>Promedios de las Estudiantes: <br> Materia: <strong><?php echo e($nomMateria); ?></strong>  <br>Grado: <strong> <?php echo e($grado); ?> <?php echo e($seccion); ?> <?php echo e($categoria); ?> </strong></strong></h4>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="container-fluid">
<div class="container">
    <div class="container-fluid">

        <form  action="" method="POST"  >
            <?php echo csrf_field(); ?>
        <br>
        <tr>
            <div class="form-group">
         <table class="table" id="tablaprueba">
            <tr class="thead-dark">
                <th scope="col" >Nombres Estudiante</th>
                <th scope="col">Apellidos Estudiante</th>

                <th scope="col">Promedio periodo 1</th>
                <th scope="col">Promedio periodo 2</th>
                <th scope="col">Promedio periodo 3</th>
                <th scope="col">Promedio periodo 4</th>

                <th scope="col">Promedio Final</th>

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
                    <?php $__currentLoopData = $promedios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promedio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $j=1; if(str_contains($promedio->estudiantes_id, $estudiante[$i]->id)){
                        echo "<th>$promedio->prom_per_1</th>";
                        $j++;
                    }?>
                    <?php $j=1; if(str_contains($promedio->estudiantes_id, $estudiante[$i]->id)){
                        echo "<th>$promedio->prom_per_2</th>";
                        $j++;
                    }?>
                    <?php $j=1; if(str_contains($promedio->estudiantes_id, $estudiante[$i]->id)){
                        echo "<th>$promedio->prom_per_3</th>";
                        $j++;
                    }?>
                        <?php $j=1; if(str_contains($promedio->estudiantes_id, $estudiante[$i]->id)){
                            echo "<th>$promedio->prom_per_4</th>";
                            $j++;
                        }?>


<?php $j=1; if(str_contains($promedio->estudiantes_id, $estudiante[$i]->id)){
    echo "<th>$promedio->prom_final</th>";
    $j++;
}?>
                    </th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php $i++;?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
          </div>
          </tr>
      <br>
    </form>
    </div>
</div>
      </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Documentos\GitHub\roles\resources\views/notas/verPromedios.blade.php ENDPATH**/ ?>
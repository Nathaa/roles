<?php $__env->startSection('content'); ?>

 <div class="container-fluid">
    <div class="card">
        <div class="card-header">


        </div>
        <div class="d-flex justify-content-end mb-3">
        
        <a class="btn btn-primary" href="<?php echo e(url('/imprimir',$x)); ?>">Descargar Boleta</a>
       
        </div>
        <img src="../img/logo.jpg" width="100" height="100" />
        
        <div class="card-body">
            
           <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p> Alumna: <?php echo e($d->nombre); ?> </p> <br/>
            <p> Grado: <?php echo e($d->grado); ?> </p> <br/>
            <p> Periodo: <?php echo e($d->nombre_periodo); ?> </p> <br/>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Nombre</th>
           <th scope="col">Examen 1</th>
           <th scope="col">Examen 2</th>
           <th scope="col">Examen 3</th>
           <th scope="col">Tarea 1</th>
           <th scope="col">Tarea 2</th>
           <th scope="col">Promedio</th>
           <th scope="col">Estado</th>

         </tr>
       </thead>
       <tbody>
          <?php $__currentLoopData = $reportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reporte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <td><?php echo e($reporte->nombre); ?></td>
            <td><?php echo e($reporte->examen1); ?></td>
            <td><?php echo e($reporte->examen2); ?></td>
            <td><?php echo e($reporte->examen3); ?></td>
            <td><?php echo e($reporte->tarea1); ?></td>
            <td><?php echo e($reporte->tarea2); ?></td>
            <td><?php echo e($reporte->promedio); ?></td>
            <td><?php echo e($reporte->estado); ?></td>

           </tr>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </tbody>
      </table>
      <br>
            <div class="row">
              <div class="mr-auto">
              
              </div>
            </div>
</div>
</div>
</div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/reportes/show.blade.php ENDPATH**/ ?>
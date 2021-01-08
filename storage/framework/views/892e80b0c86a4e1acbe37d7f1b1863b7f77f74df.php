<div class="container-fluid">
    <div class="card">
        <div class="card-header">

        
                            <img src="img/logo.jpg" width="100" height="100" />
                        
        </div>
        
        <div class="card-body">
            

            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p> Alumna: <?php echo e($d->nombre); ?> </p> <br/>
            <p> Grado: <?php echo e($d->grado); ?> </p> <br/>
            <p> Periodo: <?php echo e($d->nombre_periodo); ?> </p> <br/>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <table border="1">
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
            <td align='right'><?php echo e($reporte->examen1); ?></td>
            <td align='right'><?php echo e($reporte->examen2); ?></td>
            <td align='right'><?php echo e($reporte->examen3); ?></td>
            <td align='right'><?php echo e($reporte->tarea1); ?></td>
            <td align='right'><?php echo e($reporte->tarea2); ?></td>
            <td align='right'><?php echo e($reporte->promedio); ?></td>
            <td align='center'><?php echo e($reporte->estado); ?></td>

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
<?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/export_pdf.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
  <h6>
   <?php if($search): ?>
  <div class="alert alert-info" role="alert">
    Los resultados de tu busqueda <?php echo e($search); ?> son
  </div>
  <?php endif; ?>
 </h6>

 <div class="container-fluid">
    <div class="card">
        <div class="card-header">


        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="<?php echo e(route('reportes.index')); ?>"><i class="fa fa-align-justify"></i> Listado reportes de notas</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Nombre</th>
           <th scope="col">Opcion</th>

         </tr>
       </thead>
       <tbody>
          <?php $__currentLoopData = $reportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reporte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <td><?php echo e($reporte->nombre); ?></td>


                <td width="">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reportes.show')): ?>
                <a href="<?php echo e(route('reportes.show',  $reporte->id)); ?>" > <button type="button" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>Generar Reporte de Notas </button> </a>


                <?php endif; ?>

           </tr>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </tbody>
      </table>
      <br>
            <div class="row">
              <div class="mr-auto">
                <?php echo e($reportes->links()); ?>

              </div>
            </div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/reportes/index.blade.php ENDPATH**/ ?>
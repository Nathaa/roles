<?php $__env->startSection('title'); ?>
<h3>Configurar las notas de las materias que imparte</h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <div class="card-body">
            <div class="form-group row">
              <div class="col-md-6">
                  <a href="<?php echo e(route('notas.confignotas')); ?>"><i class="fa fa-align-justify"></i> Listado Materias en curso</a>
              </div>
            </div>
    <table class="table table-bordered thead-dark table-hover table-sm">
        <tr>
          <th scope="col">Materia</th>
          <th scope="col">Grado</th>
          <th scope="col">¿Establecidas las notas?</th>
          <th colspan="3">&nbsp;Asignar # de notas</th>
        </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <td width="35%"><?php echo e($materia->nombre); ?></td>


                <td width="35%">
                    <?php echo e($materia->grado); ?>

                    <?php echo e($materia->seccion); ?>

                    <?php echo e($materia->categoria); ?>

                </td>
                <td width="15%">
                    <?php if($materia->nombre == "Matematica"){
                        echo "<font color='#ff0000'>"; echo "matematica en rojo"; echo" </font>";
                    }?>
                </td>
                <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notas.editarnotas')): ?>

                    <a href="<?php echo e(route('notas.editarnotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre])); ?>" class="btn btn-default btn-flat" title="Editar">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                      </a>
                      <?php endif; ?>
                    </td>
           </tr>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>

      </div>
    </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Documentos\GitHub\roles\resources\views/notas/confignotas.blade.php ENDPATH**/ ?>
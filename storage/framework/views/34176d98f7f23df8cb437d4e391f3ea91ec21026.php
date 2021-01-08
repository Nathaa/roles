<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <div class="card-body">
            <h3>Configurar y digitar las notas de las materias que imparte</h3>
            <div class="form-group row">
              <div class="col-md-6">
                  <a href="<?php echo e(route('notas.confignotas')); ?>"><i class="fa fa-align-justify"></i> Listado Materias en curso</a>
              </div>
            </div>

    <table class="table table-bordered table-hover table-sm">
    <thead>
        <tr class="thead-dark">
          <th scope="col">Materia</th>
          <th scope="col">Grado</th>
          <th scope="col">Asignar # de notas</th>
          <th scope="col">Digitar Notas Estudiantes</th>
          <th scope="col">Ver Promedios</th>
          <th scope="col">Ver Notas Por Periodos</th>
        </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
            <td width="20%"><?php echo e($materia->nombre); ?></td>

                <td width="25%">
                    <?php echo e($materia->grado); ?>

                    <?php echo e($materia->seccion); ?>

                    <?php echo e($materia->categoria); ?>

                </td>
                <td width="10%">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notas.editarnotas')): ?>

                    <a href="<?php echo e(route('notas.editarnotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre])); ?>" class="btn btn-default btn-flat" title="Editar">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                      </a>
                      <?php endif; ?>
                </td>
                <td width="15%">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notas.ingresoNotas')): ?>
                    <a href="<?php echo e(route('notas.ingresoNotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre])); ?>" class="btn btn-success btn-flat" title="IngresarNotas">
                        <i class="far fa-address-book" aria-hidden="true"></i>
                      </a>
                      <?php endif; ?>
                </td>


                <td width="10%">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notas.verPromedios')): ?>
                    <a href="<?php echo e(route('notas.verPromedios', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre, 'idgrado'=>$materia->id, 'categoria'=>$materia->categoria])); ?>" class="btn btn-info btn-flat" title="ver">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                      <?php endif; ?>
                    </td>
                    <td width="20%">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notas.verNotas')): ?>
                        <a class="btn btn-info mt-1" href="<?php echo e(route('notas.verNotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre, 'idgrado'=>$materia->id, 'categoria'=>$materia->categoria , 'periodo'=>'1'])); ?>" class="btn btn-default btn-flat" title="ver">
                            Periodo 1
                          </a>
                          <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notas.verNotas')): ?>
                        <a class="btn btn-info mt-1" width="10%" href="<?php echo e(route('notas.verNotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre, 'idgrado'=>$materia->id, 'categoria'=>$materia->categoria , 'periodo'=>'2'])); ?>" class="btn btn-default btn-flat" title="ver">
                            Periodo 2
                          </a>
                          <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notas.verNotas')): ?>
                        <a class="btn btn-info mt-1" href="<?php echo e(route('notas.verNotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre, 'idgrado'=>$materia->id, 'categoria'=>$materia->categoria , 'periodo'=>'3'])); ?>" class="btn btn-default btn-flat" title="ver">
                            Periodo 3
                          </a>
                          <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notas.verNotas')): ?>
                        <a class="btn btn-info mt-1" href="<?php echo e(route('notas.verNotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre, 'idgrado'=>$materia->id, 'categoria'=>$materia->categoria , 'periodo'=>'4'])); ?>" class="btn btn-default btn-flat" title="ver">
                            Periodo 4
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
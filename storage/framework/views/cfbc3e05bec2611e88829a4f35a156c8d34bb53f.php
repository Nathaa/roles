<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
  </ol>
  <?php if(Session::has('success_message')): ?>
    <div id="msj_verde" class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo e(Session::get('success_message')); ?>

    </div>
  <?php endif; ?>

  <?php if(Session::has('info_message')): ?>
    <div id="msj_azul" class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo e(Session::get('info_message')); ?>

    </div>
  <?php endif; ?>

  <?php if(Session::has('danger_message')): ?>
    <div id="msj_rojo" class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo e(Session::get('danger_message')); ?>

    </div>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h6>
    <?php if($search): ?>
      <div class="alert alert-info" role="alert">
        Resultados de la busqueda <?php echo e($search); ?>

      </div>
      <?php endif; ?>
</h6>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('materias.create')): ?>
                 <a href="<?php echo e(route('materias.create')); ?>"> <button type="button" class="btn btn-dark btn-xs">
                <i class="fas fa-plus"></i>Crear Nueva </button> </a>
            <?php endif; ?>
        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="<?php echo e(route('materias.index')); ?>"><i class="fa fa-align-justify"></i> Listado Materias</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
                <thead>
                    <tr>
                        <th>Nombre de la Materia</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th colspan="3">&nbsp;Opciones</th>
                    </tr>
                </thead>
                <tbody>
            <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($materia->nombre); ?></td>
                    <td><?php echo e($materia->descripcion); ?></td>
                        <td>
                                <?php if($materia->estado == '1'): ?>
                                <span class="badge badge-success">Activo</span>
                                <?php else: ?>
                                <span class="badge badge-danger">Desactivado</span>
                                <?php endif; ?>
                        </td>
                        <td width="10px">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('materias.edit')): ?>

                        <a href="<?php echo e(route('materias.edit', $materia->id)); ?>" class="btn btn-default btn-flat" title="Editar">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                          </a>
                          <?php endif; ?>
                        </td>
                        <td width="10px">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('materias.show')): ?>

                        <a href="<?php echo e(route('materias.show', $materia->id)); ?>" class="btn btn-info btn-flat" title="Visualizar">
                            <i class="fas fa-eye" aria-hidden="true"></i>
                          </a>

                        <?php endif; ?>
                        </td>
                        <td width="10px">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('materias.destroy')): ?>
                        <?php echo Form::open(['route' => ['materias.destroy', $materia->id],
          'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar la materia?")']); ?>

          <button class="btn btn-danger" class="btn btn-info btn-flat" title="Eliminar">
            <i class="fas fa-trash" aria-hidden="true"></i>
          </button>
        <?php echo Form::close(); ?>

                        <?php endif; ?>
                        </td>
                    </tr>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </tbody>
            </table>
            <br>
            <div class="row">
              <div class="mr-auto">
                <?php echo e($materias->links()); ?>

              </div>
            </div>
        </div>

    </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/materias/index.blade.php ENDPATH**/ ?>
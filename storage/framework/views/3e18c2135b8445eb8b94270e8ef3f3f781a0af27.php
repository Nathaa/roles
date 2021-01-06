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


<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">

    <h6>
    
  </h6>
  <div class="container-fluid">
        <div class="card">
            <div class="card-header">

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('matriculas.create')): ?>
                    <a href="<?php echo e(route('matriculas.tipoMatricula')); ?>"> <button type="button" class="btn btn-dark btn-xs">
                    <i class="fas fa-plus"></i> Crear Matricula </button> </a>
                    
                <?php endif; ?>
                

                
            </div>


            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <a href="<?php echo e(route('matriculas.index')); ?>"><i class="fa fa-align-justify"></i> Listado Matriculas</a>
                    </div>
                </div>
                <table class="table table-bordered thead-dark table-hover table-sm">
                      <tr>

                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Grado</th>
                        <th scope="col">Seccion</th>
                        <th scope="col">Turno</th>
                        <th scope="col">Año</th>
                        <th colspan="3">&nbsp;Opciones</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $matriculas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matricula): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($matricula->nombre); ?></td>
                          <td><?php echo e($matricula->apellido); ?></td>
                          <td><?php echo e($matricula->grado); ?></td>
                          <td><?php echo e($matricula->seccion); ?></td>
                          <td><?php echo e($matricula->nombre_turno); ?></td>
                          <td><?php echo e($matricula->año); ?></td>
                          <td width="10px">
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('matriculas.edit')): ?>

                          <a href="<?php echo e(route('matriculas.edit', $matricula->id)); ?>" class="btn btn-default btn-flat" title="Editar">
                              <i class="fa fa-wrench" aria-hidden="true"></i>
                          </a>
                          <?php endif; ?>
                          </td>
                          <td width="10px">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('matriculas.show')): ?>

                            <a href="<?php echo e(route('matriculas.show', $matricula->id)); ?>" class="btn btn-info btn-flat" title="Visualizar">
                                <i class="fas fa-eye" aria-hidden="true"></i>
                            </a>

                            <?php endif; ?>
                          </td>
                          <td width="10px">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('matriculas.destroy')): ?>
                            <?php echo Form::open(['route' => ['matriculas.destroy', $matricula->id],
                            'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el expediente?")']); ?>

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

            </div>
          </div>
      </div>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/matriculas/index.blade.php ENDPATH**/ ?>
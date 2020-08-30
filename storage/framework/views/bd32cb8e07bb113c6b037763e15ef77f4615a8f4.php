<?php $__env->startSection('content'); ?>


<div class="container text-center" style="background-color: LightSteelBlue;">
    <i class="fas fa-book-open" style='font-size:36px;color: #778899'></i>
        <h4>Listado de Materias</h4>
</div>
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
                    <a href="<?php echo e(route('materias.index')); ?>"><i class="fa fa-align-justify"></i> Materias</a>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('materias.create')): ?>
                     <a href="<?php echo e(route('materias.create')); ?>"> <button type="button" class="btn btn-dark">
                    <i class="fas fa-plus"></i> Nuevo </button> </a>
                <?php endif; ?>
            </div>


            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        
                    </div>
                </div>
                <table class="table table-bordered thead-dark table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nombre de la Materia</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Opciones</th>
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
                            <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('materias.edit')): ?>

                            <a href="<?php echo e(route('materias.edit', $materia->id)); ?>" class="btn btn-default btn-flat" title="Editar">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                              </a>
                              <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('materias.show')): ?>

                            <a href="<?php echo e(route('materias.show', $materia->id)); ?>" class="btn btn-info btn-flat" title="Visualizar">
                                <i class="fas fa-eye" aria-hidden="true"></i>
                              </a>
                            
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('materias.destroy')): ?>
                            <a href="<?php echo e(route('materias.destroy', $materia->id)); ?>" data-target="#modal-delete-<?php echo e($materia->id); ?>" data-toggle="modal" class="btn btn-danger btn-flat" title="Eliminar">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                            <?php endif; ?>
                            </td>
                        </tr> 

                        <?php echo $__env->make('materias.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                       
                        
                        
                    </tbody>
                </table>
                
            </div>
            <?php echo e($materias->links()); ?>

        </div>
        
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Materias UES Damaris\Sistema_Oficial_CEFRAM\roles\resources\views/materias/index.blade.php ENDPATH**/ ?>
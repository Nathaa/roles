<?php $__env->startSection('title'); ?>
<h3>Modificando Roles</h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
        <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-sm btn-dark pull-rigth" > Regresar atras</a>


  </ol>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="card">

       <div class="card-boady">
        <table class="table table-bordered table-hover">


                        <?php echo Form::model($role, ['route' => ['roles.update', $role->id],
                        'method' =>'PUT']); ?>





                        <?php echo $__env->make('roles.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       <?php echo Form::close(); ?>

                </div>
            </div>
            <div class="card-footer">

            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/roles/edit.blade.php ENDPATH**/ ?>
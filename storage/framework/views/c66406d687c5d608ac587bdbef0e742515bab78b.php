<?php $__env->startSection('title'); ?>
<h3>Nuevo Usuario</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <b> Nuevo Usuario</b>
                </div>

                <div class="panel-body">

                 <?php echo Form::open(['route' => 'usuarios.store','files'=> true]); ?>

                 <enctype="multipart/form-data">
                 <?php echo $__env->make('usuarios.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                 <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/usuarios/create.blade.php ENDPATH**/ ?>
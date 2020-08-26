<?php $__env->startSection('title'); ?>
<h3>Editando el Periodo: <?php echo e($periodo->nombre); ?></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
        <a href="<?php echo e(route('periodos.index')); ?>" class="btn btn-sm btn-dark pull-rigth" > Regresar atras</a>


  </ol>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">

       <div class="card-boady">
        <table class="table table-bordered table-hover">

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST"
                 <?php echo Form::model($periodo, ['route' => ['periodos.update', $periodo->id],
                 'method' =>'PUT']); ?>

                 <enctype="multipart/form-data">
                 <
                 <?php echo $__env->make('periodos.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 <?php echo Form::close(); ?>




                </table>

        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\repo\roles\resources\views/periodos/edit.blade.php ENDPATH**/ ?>
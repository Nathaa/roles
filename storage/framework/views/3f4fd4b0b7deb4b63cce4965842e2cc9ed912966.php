<?php $__env->startSection('title'); ?>
<h5><strong>Modificando: <?php echo e($planEstudio->nombre_plan); ?></strong> </h5>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="<?php echo e(route('planesEstudio.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="card">
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <form method="POST"
        <?php echo Form::model($planEstudio, ['route' => ['planesEstudio.update', $planEstudio->id],
        'method' =>'PUT', 'files' => true]); ?>

        <enctype="multipart/form-data">

        <?php echo $__env->make('planesEstudio.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo Form::close(); ?>

      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IsraelErazo\Documents\roles\resources\views/planesEstudio/edit.blade.php ENDPATH**/ ?>
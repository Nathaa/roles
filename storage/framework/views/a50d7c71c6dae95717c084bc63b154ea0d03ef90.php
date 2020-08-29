<?php $__env->startSection('title'); ?>
<h3>Modificando Expediente de: <?php echo e($estudiante->nombre); ?></h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
        <a href="<?php echo e(route('estudiantes.index')); ?>" class="btn btn-sm btn-dark pull-rigth" > Regresar atras</a>


  </ol>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">

       <div class="card-boady">
        <table class="table table-bordered table-hover">

                        <form method="POST"
                        <?php echo Form::model($estudiante, ['route' => ['estudiantes.update', $estudiante->id],
                        'method' =>'PUT', 'files' => true]); ?>

                        <enctype="multipart/form-data">


                        <img width="150px" src="<?php echo e($estudiante->imagen); ?>" class="img-responsive">
                        <?php echo $__env->make('estudiantes.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       <?php echo Form::close(); ?>


            <div class="card-footer">

            </table>
           </div>
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\GitHub\roles\resources\views/estudiantes/edit.blade.php ENDPATH**/ ?>
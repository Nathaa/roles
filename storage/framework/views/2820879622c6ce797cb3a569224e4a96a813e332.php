<?php $__env->startSection('title'); ?>
<h3>Modificando Datos De Grado : <?php echo e($grado->grado); ?> <?php echo e($grado->seccion); ?></h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
        <a href="<?php echo e(route('grados.index')); ?>" class="btn btn-sm btn-dark pull-rigth" > Regresar atras</a>


  </ol>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">

       <div class="card-boady">
        <table class="table table-bordered table-hover">

                        <form method="POST"
                        <?php echo Form::model($grado, ['route' => ['grados.update', $grado->id],
                        'method' =>'PUT', 'files' => true]); ?>

                        <enctype="multipart/form-data">



                        <?php echo $__env->make('grados.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       <?php echo Form::close(); ?>

                </div>
            </div>
            <div class="card-footer">

            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Documentos\GitHub\roles\resources\views/grados/edit.blade.php ENDPATH**/ ?>
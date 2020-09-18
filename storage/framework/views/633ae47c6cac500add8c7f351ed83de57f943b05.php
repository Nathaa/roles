<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">

        <li class="breadcrumb-item active"><a href="<?php echo e(route('materias.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

    </ol>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php if(count($errors)>0): ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="card">

           <div class="card-body">
            <table class="table table-bordered table-hover">

                 <?php echo Form::open(['route' => 'materias.store','files'=> true]); ?>

                 <enctype="multipart/form-data">
                 <?php echo $__env->make('materias.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                 <?php echo Form::close(); ?>


            </table>
        </div>
    </div>
 </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Documentos\GitHub\roles\resources\views/materias/create.blade.php ENDPATH**/ ?>
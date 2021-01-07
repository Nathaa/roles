<?php $__env->startSection('title'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h4><strong>Generar Promedios de los grados</strong></h4>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="container-fluid">
<div class="container">
    <div class="container-fluid">
        <h4><strong>Seleccione un grado y de click en el icono generar Promedios: <i class="btn btn-success far fa-address-book" aria-hidden="true"></i></strong></h4>
        <form  action="" method="POST"  >
            <?php echo csrf_field(); ?>
        <br>
        <tr>
            <div class="form-group">
         <table class="table" id="tablaprueba">
            <tr class="thead-dark">
                <th scope="col" >Grado</th>
                <th scope="col">Generar Promedios</th>
                <th scope="col">Ver Promedios</th>
            </tr>

            <tbody>

                <?php $__currentLoopData = $grados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th>
                        <?php echo e($grado->grado); ?> <?php echo e($grado->seccion); ?> <?php echo e($grado->categoria); ?>

                    </th>
                    <th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can:notas.sacarPromedios')): ?>
                  <a href="<?php echo e(route('notas.guardarPromedios', ['idgrado'=>$grado->id])); ?>" class="btn btn-success" title="Visualizar">
                      <i class="far fa-address-book" aria-hidden="true"></i>
                    </a>
                  <?php endif; ?>
                </th>
                <th>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('can:notas.verPromedios')): ?>

                  <a href="<?php echo e(route('notas.verPromedios', ['idgrado'=>$grado->id])); ?>" class="btn btn-info" title="Visualizar">
                      <i class="far fa-eye" aria-hidden="true"></i>
                    </a>


                  <?php endif; ?>
                </th>
                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
          </div>
          </tr>
      <br>
    </form>
    </div>
</div>
      </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Documentos\GitHub\roles\resources\views/notas/sacarPromedios.blade.php ENDPATH**/ ?>
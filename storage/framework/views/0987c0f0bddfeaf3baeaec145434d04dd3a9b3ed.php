<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">

  </ol>
  <?php if(Session::has('success_message')): ?>
  <?echo "asdasdads"?>
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
</div><!-- /.col -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h4>Asignar las notas para la materia: <strong><?php echo e($nombremateria); ?></strong>  <br>Grado: <strong> <?php echo e($gradogrado); ?> <?php echo e($secciongrado); ?> <?php echo e($categoriagrado); ?> </strong></h4>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<div class="container-fluid">
<div class="container">
    <div class="container-fluid">
        <h4><strong>Digite las notas de las estudiantes y de click en guardar notas</strong></h4>
        <form   action="<?php echo e(route('notas.guardarNotasIngresadas', ['idgrado'=>$idgrado, 'idmateria'=>$idmateria, 'periodo'=>$periodoSelecc, 'anioID'=>$anioID])); ?>" method="POST"  >
            <?php echo csrf_field(); ?>
        <br>
        <tr>
            <div class="form-group">
         <table class="table">
            <tr class="thead-dark">
                <th scope="col">Nombres Estudiante</th>
                <th scope="col">Apellidos Estudiante</th>
                <?php $__currentLoopData = $notasLlenar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th scope="col">Nota: <?php echo e($nota->tipo_nota); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>

            <tbody>
                <?php $i=0;?>
                <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th>
                        <input type="hidden" id="idestu" name="idestu[]" value="<?php echo e($estudiante[$i]->id); ?>">
                        <?php echo e($estudiante[$i]->nombre); ?>

                    </th>
                    <th>
                        <?php echo e($estudiante[$i]->apellido); ?>

                    </th>
                    <?php $__currentLoopData = $notasLlenar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" id="tipo_nota" name="tipo_nota[]" value="<?php echo e($nota->tipo_nota); ?>">
                    <input type="hidden" id="ponderacion" name="ponderacion[]" value="<?php echo e($nota->ponderacion); ?>">
                    <th scope="col"><?php echo e(Form::number('valor_nota',null,['class' => 'form-control' , 'step'=>'0.01', 'id'=> 'valor_nota','name' => 'nombreNota[]' , 'placeholder' => 'digite la nota','onkeyup' => 'validar_numero(this)', 'onblur' => 'validar_numero(this)', 'required' => 'required','autofocus'=>'autofocus'])); ?></th>
                    <div class="invalid-feedback" style="display:none">
                        El numero debe estar entre 0 y 10
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php $i++;?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
          </div>
          </tr>
      <br>
      <?php echo e(Form::submit('     Guardar Notas Estudiantes    ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit'])); ?>

    </form>
    </div>
</div>
      </div>
    </div>
</div>
</div>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/validar-form-notas.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Documentos\GitHub\roles\resources\views/notas/notasPeriodo.blade.php ENDPATH**/ ?>
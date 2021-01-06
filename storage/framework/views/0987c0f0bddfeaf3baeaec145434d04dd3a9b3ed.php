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
        <form  action="<?php echo e(route('notas.guardarNotasIngresadas', ['idgrado'=>$idgrado, 'idmateria'=>$idmateria, 'periodo'=>$periodoSelecc])); ?>" method="POST"  >
            <?php echo csrf_field(); ?>
        <br>
        <tr>
            <div class="form-group">
         <table class="table" id="tablaprueba">
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
                <tr id="row" name="row">
                    <th>
                        <input type="hidden" id="idestu" name="idestu[]" value="<?php echo e($estudiante[$i]->id); ?>">
                        <?php echo e($estudiante[$i]->nombre); ?>

                    </th>
                    <th>
                        <?php echo e($estudiante[$i]->apellido); ?>

                    </th>
                    <?php $__currentLoopData = $notasLlenar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th scope="col"><?php echo e(Form::number('tipo_nota',null,['class' => 'form-control', 'id'=> 'tipo_nota','name' => 'nombreNota[]' , 'placeholder' => 'digite la nota', 'required' => 'required','autofocus'=>'autofocus'])); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php $i++;?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
          </div>
          </tr>
      <br>
      <button type="submit" class="btn  btn-success float-sm-left" id="btnContinuar">Guardar Notas</button>
    </form>
    </div>
</div>
      </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Documentos\GitHub\roles\resources\views/notas/notasPeriodo.blade.php ENDPATH**/ ?>
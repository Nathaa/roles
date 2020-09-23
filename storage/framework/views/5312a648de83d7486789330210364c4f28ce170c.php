<?php echo csrf_field(); ?>



<div class="alert alert-primary" role="alert">
        Datos del Año
</div>

<form>


            <div class="card-body">
                <table class="table table-bordered col-md-8 col-md-offset-2 thead-dark table-hover table-sm">
                    <tr>

                      <th scope="col">Grados</th>
                      <th scope="col">Categoria</th>
                    </tr>
                    <tbody>

                        <?php $__currentLoopData = $grados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <select name="grados_id" id="grados_id" class="form-control" style="font-size: 17px;">
                                    <option value="">Seleccione Grado</option>

                                            <option value="<?php echo e($grado->id); ?>">
                                                <?php echo e($grado->grado); ?>

                                            </option>

                                    </select>

                            </td>
                            <td><?php echo e($grado->categoria); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </tbody>
                </table>

            </div>

    <div class="row">
       <div class="col">

       </div>
       <div class="col">
        <div class="form-group">
            <ul class="list-unstyled">
               <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li>
                   <label>
                  <?php echo e(Form::checkbox('periodos[]', $periodo->id, null)); ?>

                  <?php echo e($periodo->nombre); ?>

                   </label>
               </li>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
       </div>

     </div>
     <div class="row">
        <div class="form-group">
            <ul class="list-unstyled">
               <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li>
                   <label>
                  <?php echo e(Form::checkbox('materias[]', $materia->id, null)); ?>

                  <?php echo e($materia->nombre); ?>

                   </label>
               </li>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>

 <br>
 <ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>


</form>

<?php /**PATH E:\Documentos\GitHub\roles\resources\views/asignaciones/form.blade.php ENDPATH**/ ?>
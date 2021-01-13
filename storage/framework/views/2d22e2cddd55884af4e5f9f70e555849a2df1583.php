<?php $__env->startSection('crear'); ?>
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="<?php echo e(route('materias.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<h5><strong>Modificando: <?php echo e($materia->nombre); ?></strong> </h5>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
             
                           
                <div id="msj_azul_fijo" class="alert alert-primary" role="alert">
                    Datos de la Materia
                </div>

                <?php echo Form::model($materia,['method'=>'PATCH','route'=>['materias.update', $materia->id]]); ?>

                <?php echo e(Form::token()); ?>

              

               
                <div class="row">
                    <div class="col">
                      <?php echo e(Form::label('nombre', 'Nombre')); ?>

                      <?php echo e(Form::text('nombre',$materia->nombre,['class' => 'form-control', 'id' => 'nombre_materia', 'readonly'])); ?>

                      <div class="invalid-feedback" style="display:none">
                          El nombre de la materia no debe comenzar con números ni caracteres especiales
                      </div> 
                  </div>
                    <div class="col">
                      <?php echo e(Form::label('descripcion', 'Descripcion')); ?>

                      <?php echo e(Form::text('descripcion',$materia->descripcion,['class' => 'form-control', 'id'=>'descripcion','onkeyup' => "validar_descripcion(this)", 'onblur' => "validar_descripcion(this)"])); ?>

                      <div class="invalid-feedback" style="display:none">
                          El nombre de la descripcion no debe comenzar con números ni caracteres especiales
                        </div> 
                    </div>
          
                  </div>
          
                  <div class="row">
                    <div class="col-md-8 col-md-offset-8">
                        <div class="form-group">
                            <label for="estado"> Estado  </label>
                            <select name="estado" id="estado" class="form-control" style="width: 500px",  onkeyup="validar_select(this)", onblur="validar_select(this)"  required autofocus>
                                <option value="" disabled >Elige el Estado de la Materia</option>
                                <?php if($materia->estado == true): ?>
                                <option value="1" selected>1 - Activo (La materia esta siendo Impartida) </option>
                                <option value="0">0 - Inactivo (La materia ya no se imparte) </option>
                                <?php else: ?>
                                <option value="0" selected>0 - Inactivo (La materia ya no se imparte) </option>
                                <option value="1" >1 - Activo (La materia esta siendo Impartida) </option>
                                <?php endif; ?>
                                </select>
                            <div class="invalid-feedback" style="display:none">
                               El estado no debe quedar vacío
                            </div>
                        </div>
                    </div>
                </div>
              <br>
          
          
          
                  <ol class="float-sm-right">
                      <br><?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit'])); ?>

                  </ol>
          
                <?php echo Form::close(); ?>

            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IsraelErazo\Desktop\Proyecto\roles\resources\views/materias/edit.blade.php ENDPATH**/ ?>
<?php echo csrf_field(); ?>



<div class="alert alert-primary" role="alert">
        Datos de la Matrícula
</div>

<form>

    <div class="row">
        <div class="col-sm-3">
            <?php echo e(Form::label('fecha', 'Fecha de creacion')); ?>

            <?php echo e(Form::date('fecha',$page_data['fecha_de_creacion'],['readonly'=>'readonly','id' => 'fecha','class' => 'form-control'])); ?>


        </div>
        <div class="col-sm-3">

            <?php echo e(Form::label('nombreMat', 'Identificador de matricula')); ?> <!--Este es el campo que estaba como nombre-->
            <?php echo e(Form::text('nombreMat',null,['id' => 'nombreMat','class' => 'form-control'])); ?>


        </div>

    </div>

    <div class="row">

        <div class="col-sm-3">
            <fieldset disabled>
            <?php echo e(Form::label('nombre', 'Estudiante')); ?>

            <?php echo e(Form::text('nombre',$page_data['nombre'],['readonly'=>'readonly','id' => 'nombre','class' => 'form-control'])); ?>

            </fieldset>
        </div>
        <div class="col-sm-3">
            <fieldset disabled>
            <?php echo e(Form::label('apellido', 'Apellido')); ?>

            <?php echo e(Form::text('apellido',$page_data['apellido'],['class' => 'form-control'])); ?>

            </fieldset>
        </div>

    </div>


    <div class="row">
        <div class="col-sm-3">
            <?php echo e(Form::label('grado', 'Grado')); ?>

            <?php echo e(Form::select('grado',[' ' => '---Seleccione un grado---']+$page_data['grados'],null,['id' => 'grados','class' => 'form-control','required'=> 'required'])); ?>

        </div>

        <div class="col-sm-3">
            <?php echo e(Form::label('turno', 'Turno')); ?>

            <select name="" class="form-control" id="turnos" disabled>
                <option value="">--Seleccione un turno--</option>
            </select>
        </div>
        <div class="col-sm-3">
            <?php echo Form::label('seccion', 'Seccion'); ?>

            <select name="" class="form-control" id="secciones" disabled>
                <option value="">--Seleccione una seccion--</option>
            </select>
        </div>
    </div>
    <div class="row">
        <?php echo e(Form::label('descripcion', 'Descripción')); ?>

        <?php echo e(Form::text('descripcion',null,['class' => 'form-control'])); ?>

     </div>

     <fieldset >
     <div class="row">
        <?php echo e(Form::text('anio',(int)$page_data['anio'],['hidden'=>'hidden','class' => 'form-control'])); ?>

        <?php echo e(Form::text('gradoIde',null,['hidden'=>'hidden','id' => 'gradoId', 'class' => 'form-control'])); ?>

        <?php echo e(Form::text('estudianteId',$page_data['id'],['hidden'=>'hidden','id' => 'estudianteId', 'class' => 'form-control'])); ?>

        <?php echo e(Form::text('tipoMatricula',$page_data['tipo'],['hidden'=>'hidden','id' => 'tipo', 'class' => 'form-control'])); ?>

     </div>
    </fieldset>
 <br>
 <ol class="float-sm-right">
    <?php echo e(Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success'])); ?>

</ol>
</form>
<br>
<br>




<?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/matriculas/form2.blade.php ENDPATH**/ ?>
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-<?php echo e($materia->id); ?>">
    <?php echo Form::open(array('action' => array('MateriaController@destroy', $materia->id), 'method' => 'delete')); ?>

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Baja de Materia</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
            </button>
          </div>
          <div class="modal-body">
            <p>¿Desea dar de baja la materia <?php echo e($materia->nombre); ?>?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary btn-flat">Aceptar</button>
          </div>
        </div>
      </div>
    <?php echo Form::close(); ?>

  </div><?php /**PATH C:\Materias UES Damaris\Sistema_Oficial_CEFRAM\roles\resources\views/materias/modal.blade.php ENDPATH**/ ?>
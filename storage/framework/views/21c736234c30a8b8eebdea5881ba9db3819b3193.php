<?php $__env->startSection('css_role_page'); ?>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<h3>Inscripcion <?php echo e($tipo); ?></h3>
<h3>  <i class="fas fa-angle-double-right"></i> Seleccionar Estudiante a Matricular </h3>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <div class="container">

        <form  action="<?php echo e(route('matriculas.create')); ?>" method="POST" name="hideform" >
        <div class="card">
            <div class="card-body">
                <table id="Estudiantes" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th style="visibility:collapse;">Id</th>
                        </tr>
                    <tbody>
                        <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($estudiante->nombre); ?></td>
                            <td><?php echo e($estudiante->apellido); ?></td>
                            <td style="visibility:collapse;"><?php echo e($estudiante->id); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                    </thead>
                </table>
                <br>
                <br>
                <ol class="float-sm-right">
                <p><button type="submit" class="btn  btn-sm btn-success" id="btnEnviar">Enviar Estudiante</button></p>
                <!--<button id="button" ,class="btn  btn-sm btn-success" >btn</button>-->
                </ol>
            </div>
        </div>
    </div>


        <?php echo csrf_field(); ?>
        <input type="number" name="idEstudiante" style="visibility:collapse;">
        <input type="text" name="tipoIncripcion" id="tipo" value="<?php echo e($tipo); ?>" style="visibility:collapse;">
    </form>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js_role_page'); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
    //document.hideform.idEstudiante.value = item[2] ;

    document.getElementById("btnEnviar").disabled =true;

    var table = $('#Estudiantes').DataTable();

    $('#Estudiantes tbody').on( 'click', 'tr', function () {
        //borro la fila seleccionada antes
        table = $("#Estudiantes").DataTable(); table .rows( '.selected' ) .nodes() .to$() .removeClass( 'selected' );
        //al seleccionar le agrego la clase selected
        $(this).toggleClass('selected');
        var ids = $.map(table.rows('.selected').data(), function (item) {
            //var id=parseInt(item[2], 10);
            var id=BigInt(item[2]);
            document.hideform.idEstudiante.value = id ;
            document.getElementById("btnEnviar").disabled =false;
        });
    }    );

} );//final de document ready

//Para el formato de idioma de la dataTable
$('#Estudiantes').DataTable({
    "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/matriculas/dataTable.blade.php ENDPATH**/ ?>
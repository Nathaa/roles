<?php $__env->startSection('title'); ?>
<h3>Seleccionar el Tipo de Matricula </h3>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="card">
            <div class="card-body">


                
                <form  action="<?php echo e(route('matriculas.dataTable')); ?>" method="POST"  >
                    <?php echo csrf_field(); ?>

                    <input type="radio" name="tipo" id="inscNormal" value="Normal"> Inscripcion en periodo normal<br>
                    <br>
                    <input type="radio" name="tipo" id="inscExtemp" value="Extemporanea"> Inscripcion en periodo extraordinario<br>
                    <br>

                    <ol class="float-sm-right">
                        <p><button type="submit" class="btn  btn-sm btn-success" id="btnContinuar">Continuar</button></p>
                       
                    </ol>



                </form>
                




            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function(){

        $(function anioLectivoSiguiente(){
            $.get('/matricula/anioLectivoSiguiente',function (datos1){
                var check = datos1;
                console.log(datos1);
            if(check =="NoExiste"){
                alert("No existe año lectivo, si se desea inscribir para el siguiente año ,por favor registrar un nuevo año");
                var btn=document.getElementById("inscNormal").disabled=true;

            }

            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/matriculas/tipoMatricula.blade.php ENDPATH**/ ?>
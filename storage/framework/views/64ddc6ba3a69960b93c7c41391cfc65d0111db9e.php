<?php $__env->startSection('crear'); ?>
<div class="col-sm">
    <ol class="breadcrumb float-sm-right">
    <a href="#" data-toggle="modal" data-target="#modalConsultarCupos"> <button type="button" id="btnModal" class="btn btn-dark btn-xs"  >
    <i class="fas fa-eye"></i> Ver grados disponibles </button> </a>
  </ol>
</div>

  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="<?php echo e(route('matriculas.index')); ?>" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>

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

                 <?php echo Form::open(['route' => 'matriculas.store','files'=> true]); ?>

                 <?php echo $__env->make('matriculas.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                 <?php echo Form::close(); ?>


            </table>
        </div>
    </div>
 </div>
 <?php echo $__env->make('matriculas.modalConsultarCupos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><!-- aqui meto el modal -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>
    
    $(function(){
            $('#grados').on('change',onSelectGradoChange);
            $('#turnos').on('change',onSelectTurnoChange);
            $('#grados')[0].selectedIndex = 0;

             if($('#grados')[0].selectedIndex == 0){
                secciones.disabled=true;
            }
            //cuando se cambia grado,disparar otro evento de cambio de turno y dentro otro evento
            //de cambio de seccion y dentro consumir el servicio del rervidor para recuperar el id
            //del grado
            $('#grados').on('change',function(algo){
                secciones.disabled=true;//CAMBIO: cuando se selecciona un nuevo grado, se resetea el combo de las secciones
                secciones.selectedIndex=0;
                $('#turnos').on('change',function(algo2){
                    $('#secciones').on('change',function(algo3){
                        var gradoCombo      = document.getElementById('grados');
                        var gradoSelected   = gradoCombo.options[gradoCombo.selectedIndex].text;
                        var turnoCombo      = document.getElementById('turnos');
                        var turnoSelected   = turnoCombo.options[turnoCombo.selectedIndex].text;
                        if(turnoSelected=="Matutino"){turnoSelected=1};
                        if(turnoSelected=="Vespertino"){turnoSelected=2};
                        if(turnoSelected=="Completo"){turnoSelected=3};
                        var seccionesCombo  = document.getElementById('secciones');
                        var seccionSelected = seccionesCombo.options[seccionesCombo.selectedIndex].text;
                        //matricula/{grado}/grado/{turno}/turno/{seccion}/seccion/{anio}/anio
                        var anio=<?php echo json_encode($page_data['anio']); ?>;
                        $.get('/matricula/'+gradoSelected+'/grado/'+turnoSelected+'/turno/'+seccionSelected+'/seccion/'+anio+'/anio',function (data){
                            //console.log(data[0].id);
                            //var idEnTexto = data[0].id.toString();
                            //$('#gradoId').html("idEnTexto");
                            //document.getElementById('#gradoId').value=idEnTexto;
                            $('#gradoId').val(data[0].id);
                            //console.log(idEnTexto);

                        });
                    });
                });
            });//fin de la funcion para verificar cambios en cascada

        });

        function onSelectGradoChange() {
            var grado_id=$(this).val();
            var gradoCombo = document.getElementById('grados');
            var gradoSelected = gradoCombo.options[gradoCombo.selectedIndex].text;
            var secciones = document.getElementById('secciones');
            //var turnos = document.getElementById('turnos');
            //var turnoSelected = turnos.options[turnos.selectedIndex].text;
            //secciones.disabled=false;//activa el combo de secciones
            turnos.disabled=false;//activa el combo de turnos
            //function cargarAjax();
            //alert(gradoSelected);
            //peticion ajax por medio de jquery
            //para llenar el combo de turnos
            var anioId=<?php echo json_encode($page_data['anio']); ?>;
            $.get('/turnos/'+gradoSelected+'/grados/'+anioId+'/anio',function (datos1){
              //$.get('/secciones/'+gradoSelected+'/grados',function (datos){
                var plantilla_turnos = '<option value="">--Seleccione un turno--</option>';
                for(var i=0;i<datos1.length;i++){
                    if(datos1[i].turnos_id=="1"){datos1[i].turnos_id="Matutino";};
                    if(datos1[i].turnos_id=="2"){datos1[i].turnos_id="Vespertino";};
                    if(datos1[i].turnos_id=="3"){datos1[i].turnos_id="Completo";};
                }
                for(var i=0;i<datos1.length;i++)
                    plantilla_turnos+='<option value="'+datos1[i].id+'">'+datos1[i].turnos_id+'</option>';
                    //console.log(plantilla_turnos);
                $('#turnos').html(plantilla_turnos);
            });
            //fin del llenado de combo de turnos
            /* //para el llenado de secciones
            $.get('/secciones/'+gradoSelected+'/'+turnoSelected+'/grados',function (datos){
              //$.get('/secciones/'+gradoSelected+'/grados',function (datos){
                var plantilla_seleccion = '<option value="">--Seleccione una seccion--</option>';
                for(var i=0;i<datos.length;i++)
                    plantilla_seleccion+='<option value="'+datos[i].id+'">'+datos[i].seccion+'</option>';
                    console.log(plantilla_seleccion);
                $('#secciones').html(plantilla_seleccion);
            }); */

            if($('#grados')[0].selectedIndex == 0){
                secciones.disabled=true;//si se selecciona el primer item se vuelve a bloquear
                //el combo de secciones
                turnos.disabled=true;
            }
            //fin del llenado de secciones
        }// fin de  onSelectGradoChange()

        function onSelectTurnoChange(){
            var gradoCombo = document.getElementById('grados');
            var gradoSelected = gradoCombo.options[gradoCombo.selectedIndex].text;
            var turnos = document.getElementById('turnos');
            var turnoSelected = turnos.options[turnos.selectedIndex].text;
            secciones.disabled=false;//activa el combo de secciones
            //para el llenado de secciones
            
            var anioId=<?php echo json_encode($page_data['anio']); ?>;
            //$.get('/secciones/'+gradoSelected+'/'+turnoSelected+'/grados',function (datos){
            $.get('/secciones/'+gradoSelected+'/'+turnoSelected+'/grados/'+anioId+'/anio',function (datos){
              //$.get('/secciones/'+gradoSelected+'/grados',function (datos){
                var plantilla_seleccion = '<option value="">--Seleccione una seccion--</option>';
                for(var i=0;i<datos.length;i++)
                    //plantilla_seleccion+='<option value="'+datos[i].id+'">'+datos[i].seccion+'</option>'; antes estaba asi, no devuelve un id la funcion
                    plantilla_seleccion+='<option value="'+datos[i].seccion+'">'+datos[i].seccion+'</option>';
                    //console.log(datos[i].id);
                $('#secciones').html(plantilla_seleccion);
                //nuevo para desactivar las opciones que se llamen Seccion llena AQUI!!!!!!
                //$("#secciones option[value=" '+ Seccion llena +' "]").attr('disabled',true);
            });

            if($('#turnos')[0].selectedIndex == 0){
                secciones.disabled=true;//si se selecciona el primer item se vuelve a bloquear
                //el combo de secciones

            }
            
        }//fin de onSelectTurnoChange

        function validarGradoLleno(){

        }//fin de validadGradoLleno

$(document).ready(function(){

    
    //fragmento para la creacion del codigo de inscripcion , primeras letras de nombre
    //apellido y anio de matriculacion
    $(function CodigoMat(){
        var $fecha=document.getElementById("fecha").value;
        var $nombre=document.getElementById("nombre").value;
        var $apellido=document.getElementById("apellido").value;
        var $espacio = " ";
        var $apellidoEspacio=$espacio.concat($apellido);
        var cad=$nombre.concat($apellidoEspacio);
        //console.log(cad);
        var arrayDeCadenas = cad.split(" ");
        //console.log(arrayDeCadenas[0].substr(0,1));
        var codigo='';
        for(var i=0;i<arrayDeCadenas.length;i++){
            if(arrayDeCadenas[i]!="de"){
                codigo+=arrayDeCadenas[i].substr(0,1);
            }
        }
        //si el periodo es normal se suma un anio al identificador si no , se deja tal cual
        var tipo=<?php echo json_encode($page_data['tipo']); ?>;
        var start=new Date($fecha);
        var startf ="";
        if(tipo=="Normal"){
            start.setFullYear(start.getFullYear()+1);
            startf = start.toISOString().slice(0,4);
            //console.log(startf);
            }
        if(tipo=="Extemporanea"){
            startf = start.toISOString().slice(0,4);
            //console.log(startf);
        }
        //codigo+=$fecha.slice(0,-6);
        codigo+=startf;
       document.getElementById("nombreMat").value=codigo;



        //console.log(val);
    });

    //var btnModal= document.getElementById("btnModal").addEventListener("click",miFuncion());
    //funcion encargada de el llenado de las barritas de estado de los gradis disponibles para inscribir 
    //por el momento no elimina de la lista los grados no disponibles 
    $(function miFuncion(){
        
        var anioId=<?php echo json_encode($page_data['anio']); ?>;
        var Anio=document.getElementById('nombreMat').value;
        var anio=Anio.substr(-4);
        var labelAnio='<label> anio '+anio+'</label>';
        $('#modalHeader').html(labelAnio);
        $.get('/alumnasCont/'+anioId,function (datos){          //aqui hago la peticion al modulo de contAlumNormal del controlador de matriculas 
            //console.log(datos['gradosCompleto'][0]['capacidad']);
            var grados=datos; //me muestra los grados 
            //console.log(grados['gradosMatutino'].length);
            //la funcion disponibles esta declarada mas abajo
            var p="";
            for(var i=0;i<grados['gradosMatutino'].length;i++){
                p+='<label>'+grados['gradosMatutino'][i]['gradoSeccion'] +'</label>';
                p+= '<meter min="0" max="'+grados['gradosMatutino'][i]['capacidad']+'" low="35" high="10" optimun="20" value="'+grados['gradosMatutino'][i]['cantidad']+'" title="'+disponibles(grados['gradosMatutino'][i]['capacidad'],grados['gradosMatutino'][i]['cantidad'])+' cupos disponibles">El navegador no soporta este elemento</meter>';  
                p+='<br>';
            }
            $('#gradosModal').html(p);
            
            var p2="";
            for(var i=0;i<grados['gradosVespertino'].length;i++){
                p2+='<label>'+grados['gradosVespertino'][i]['gradoSeccion'] +'</label>';
                p2+= '<meter min="0" max="'+grados['gradosVespertino'][i]['capacidad']+'" low="35" high="10" optimun="20" value="'+grados['gradosVespertino'][i]['cantidad']+'" title="'+disponibles(grados['gradosVespertino'][i]['capacidad'],grados['gradosVespertino'][i]['cantidad'])+' cupos disponibles">El navegador no soporta este elemento</meter>';  
                p2+='<br>';
            }
            
            $('#gradosModalVesp').html(p2);
            
            var p3="";
            for(var i=0;i<grados['gradosCompleto'].length;i++){
                p3+='<label>'+grados['gradosCompleto'][i]['gradoSeccion'] +'</label>';
                p3+= '<meter min="0" max="'+grados['gradosCompleto'][i]['capacidad']+'" low="35" high="10" optimun="20" value="'+grados['gradosCompleto'][i]['cantidad']+'" title="'+disponibles(grados['gradosCompleto'][i]['capacidad'],grados['gradosCompleto'][i]['cantidad'])+' cupos disponibles">El navegador no soporta este elemento</meter>';
                p3+='<br>'; 
            }
            //console.log(p3);
            //console.log(p2);
            $('#gradosModalComp').html(p3);
            

            function disponibles(total, inscritos){
                return total-inscritos;
            }
        });
        
    }); 
    
}); 







</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ProyectosLaravel\clonado\roles\resources\views/matriculas/create.blade.php ENDPATH**/ ?>
@extends('admin.index2')

@section('title')
    <h5><strong>Modificando: {{ $matricula->nombre  }}</strong> </h5>
@endsection

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">

    <li class="breadcrumb-item active"><a href="{{ route('matriculas.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div>
@endsection
@section('content')
<div class="container">
    <div class="card">

       <div class="card-body">
            <table class="table table-bordered table-hover">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!--<form method="POST">-->
                        <!---->
                    {!! Form::model($matricula, ['route' => ['matriculas.update', $matricula->id],
                    'method' =>'PUT'])  !!}

                    @include('matriculas.form2')
                    {!! Form::close() !!}



            </table>

        </div>

    </div>
</div>

@endsection


@section('scripts')

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
                        var anio={!! json_encode($page_data['anio']) !!};
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
            var anioId={!! json_encode($page_data['anio']) !!};
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
                    console.log(plantilla_turnos);
                $('#turnos').html(plantilla_turnos);
            });

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
            var anioId={!! json_encode($page_data['anio']) !!};
            //$.get('/secciones/'+gradoSelected+'/'+turnoSelected+'/grados',function (datos){
            $.get('/secciones/'+gradoSelected+'/'+turnoSelected+'/grados/'+anioId+'/anio',function (datos){
              //$.get('/secciones/'+gradoSelected+'/grados',function (datos){
                var plantilla_seleccion = '<option value="">--Seleccione una seccion--</option>';
                for(var i=0;i<datos.length;i++)
                    plantilla_seleccion+='<option value="'+datos[i].id+'">'+datos[i].seccion+'</option>';
                    //console.log(plantilla_seleccion);
                $('#secciones').html(plantilla_seleccion);
            });

            if($('#turnos')[0].selectedIndex == 0){
                secciones.disabled=true;//si se selecciona el primer item se vuelve a bloquear
                //el combo de secciones

            }
        }//fin de onSelectTurnoChange

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
        var tipo={!! json_encode($page_data['tipo']) !!};
        var start=new Date($fecha);
        var startf ="";
        if(tipo=="Normal"){
            start.setFullYear(start.getFullYear()+1);
            startf = start.toISOString().slice(0,4);
            console.log(startf);
            }
        if(tipo=="Extemporanea"){
            startf = start.toISOString().slice(0,4);
            console.log(startf);
        }
        //codigo+=$fecha.slice(0,-6);
        codigo+=startf;
       document.getElementById("nombreMat").value=codigo;



        //console.log(val);
    });

});


</script>
@stop



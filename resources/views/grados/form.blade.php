{!! csrf_field() !!}


<hr>

<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos de grado
      </div>

<form id="formulario">


        <div class="row">
           <div class="col">
             {{ Form::label('grado', 'Grado')}}
              {{ Form::text('grado',null,['class' => 'form-control', 'id'=>'grado','onkeyup' => "validar_campo(this)", 'onblur' => "validar_campo(this)",'placeholder' => 'Nombre del grado, numero o letra', 'required' => 'required','autofocus'=>'autofocus']) }}
              <div class="invalid-feedback" style="display:none">
                El nombre del grado puede colocarlo como texto o número.
              </div>
             </div>
               <div class="col">
                {{ Form::label('seccion', 'Seccion')}}
                {{ Form::text('seccion',null,['class' => 'form-control', 'id'=>'seccion','onkeyup' => "validar_seccion(this)", 'onblur' => "validar_seccion(this)", 'placeholder' => '"B", "b"', 'required' => 'required','autofocus'=>'autofocus']) }}
                <div class="invalid-feedback" style="display:none">
                  Debe agregar a la sección,por ejemplo B,b entre comillas dobles
                </div>
                </div>


            <div>
                {{ Form::label('capacidad', 'Capacidad')}}
                {{ Form::text('capacidad',null,['class' => 'form-control', 'id' => 'capacidad','onkeyup' => "validar_numero(this)", 'onblur' => "validar_numero(this)", 'placeholder' => 'Capacidad de alumnas por grado', 'required' => 'required','autofocus'=>'autofocus']) }}
                <div class="invalid-feedback" style="display:none">
                   Solo debe agregar números al campo capacidad
                </div>
            </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('anios_id', 'Seleccione el Año') !!}
                        <div class="form-group">
                            <select name="anios_id" id= "anios_id" class="form-control" onblur="validar_select(this)" required autofocus>
                                <option value="">--Año--</option>
                                @foreach ($anios as $anio)
                                <option value="{{ $anio->id }}"> {{ $anio->año}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback" style="display:none">
                                El campo Año no debe quedar vacío.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col">


<br>
            <div class="row">
               <div class="col">
                <div class="form-group">
                    {!! Form::label('plan_estudios_id', 'Seleccione el Plan de Estudio') !!}
                    <div class="form-group">
                        <select name="plan_estudios_id" id= "plan_estudios_id" class="form-control" onblur="validar_select(this)" required autofocus>
                            <option value="">--Plan de Estudio--</option>
                            @foreach ($planesEstudio as $planEstudio)
                            <option value="{{ $planEstudio->id }}"> {{ $planEstudio->nombre_plan}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback" style="display:none">
                            El campo Plan de estudios no debe quedar vacío.
                        </div>
                    </div>
                </div>
               </div>

                <br>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('turnos_id', 'Seleccione el Turno') !!}
                        <div class="form-group">
                            <select name="turnos_id" id= "turnos_id" class="form-control"  onblur="validar_select(this)" required autofocus>
                                <option value="">--Turnos--</option>
                                @foreach ($turnos as $turno)
                                <option value="{{ $turno->id }}"> {{ $turno->nombre_turno}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback" style="display:none">
                                El campo Turnos no debe quedar vacío.
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col">
                    {{ Form::label('categoria', 'Categoria')}}

                    <br>

    <input type="radio" name="categoria" id="categoriaTercerCiclo" value="Tercer Ciclo">Tercer Ciclo<br>
    <input type="radio" name="categoria" id="categoriaBGeneral" value="Bachillerato General">Bachillerato General<br>
    <input type="radio" name="categoria" id="categoriaBVocacional" value="Bachillerato Vocacional">Bachillerato Vocacional<br>

                  </div>

            </div>
<br>
<br>
<br>
<br>
<br>
<ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit', 'disabled']) }}
</ol>



</form>


@section('scripts')


<script type="">
    //agregado para cambiar el valor del select por el recuperado de la base
    $(document).ready(function(){
            $(function printOnSelect(){
              //si el formulario va a ser utilizado para editar mandara 1 en una bandera, si el formulario sera utilizado para crear , mandara 0
              var flag={!! json_encode($flag ?? '') !!};
              if(flag){
                  //para el combo de anios
                var anioOriginal={!! json_encode($anioOriginal ??'') !!};
                //console.log(anioOriginal);
                var anios = {!! json_encode($anios) !!};
                  for(var i=0;i<anios.length;i++){
                    if(anioOriginal==anios[i]['id']){
                      //console.log(turnos[i]['id']);
                      document.getElementById("anios_id").value = anios[i]['id'];
                    }
                  }
                  //para el combo de plan de estudios
                  var planOriginal={!! json_encode($planOriginal ??'') !!};
                    //console.log(anioOriginal);
                    var planesEstudios = {!! json_encode($planesEstudio) !!};
                    for(var i=0;i<planesEstudios.length;i++){
                        if(planOriginal==planesEstudios[i]['id']){
                        //console.log(turnos[i]['id']);
                        document.getElementById("plan_estudios_id").value = planesEstudios[i]['id'];
                        }
                    }
                    //para el combo de turnos
                    var turnoOriginal={!! json_encode($turnoOriginal ??'') !!};
                    //console.log(anioOriginal);
                    var turnos = {!! json_encode($turnos) !!};
                    for(var i=0;i<turnos.length;i++){
                        if(turnoOriginal==turnos[i]['id']){
                        //console.log(turnos[i]['id']);
                        document.getElementById("turnos_id").value = turnos[i]['id'];
                        }
                    }
                    //para el checkbox de categoria
                    var catOriginal = {!! json_encode($categoriaOriginal ??'') !!};
                    console.log(catOriginal);
                    //if()
                    if(catOriginal=='Tercer Ciclo'){
                        $("#categoriaTercerCiclo").prop("checked",true);
                    }else{
                        if(catOriginal=='Bachillerato General'){
                            $("#categoriaBGeneral").prop("checked",true);
                        }else{
                            if(catOriginal=='Bachillerato Vocacional')
                                $("#categoriaBVocacional").prop("checked",true);
                        }
                    }
              }



            });
          });
          //hasta aqui lo nuevo

</script>
<script src="{{ asset('js/validar-form-grados.js') }}"></script>
@stop


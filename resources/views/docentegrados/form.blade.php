{!! csrf_field() !!}




</div>

<hr>

<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos Asignacion Docente-Grado
</div>


<form id="formulario">

        <div class="row">

                    <div class="col">
                    <div class="form-group">
            {!! Form::label('docentes_id', 'Seleccione el Docente') !!}
            <div class="form-group">
                <select name="docentes_id" id= "docentes_id" class="form-control" onblur="validar_select(this)" required autofocus>
                    <option value="">--Docentes--</option>
                    @foreach ($docentes as $docente)
                    <option value="{{ $docente->id }}"> {{ $docente->nombre}}</option>

                    @endforeach
                </select>
                <div class="invalid-feedback" style="display:none">
                  El Docente no debe quedar vacío.
               </div>
            </div>
        </div>
                   </div>



                <div class="col">
                <div class="form-group">
            {!! Form::label('asignacions_id', 'Seleccione La asignacion') !!}
            <div class="form-group">
                <select name="asignacions_id" id= "asignacions_id" class="form-control" onblur="validar_select(this)" required autofocus>
                    <option value="">--Asignaciones--</option>

                    @foreach ($asignaciones as $asignacion)
                    <option value="{{ $asignacion->id }}">
                        {{ $asignacion->grado}}{{ $asignacion->seccion}}

                      </option>


                    @endforeach
                </select>
                <div class="invalid-feedback" style="display:none">
                   no debe quedar vacío.
               </div>
            </div>
        </div>
                </div>
                    <div class="col">
                    <div class="form-group">
            {!! Form::label('anios_id', 'Seleccione el Año') !!}
            <div class="form-group">
                <select name="anios_id" id= "anios_id" class="form-control" onblur="validar_select(this)" required autofocus>
                    <option value="">--Años--</option>
                    @foreach ($anios as $anio)
                    <option value="{{ $anio->id }}"> {{ $anio->año}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback" style="display:none">
                  El Año no debe quedar vacío.
               </div>
            </div>
        </div>
                  </div>



        </div>



<br>
<ol class="float-sm-right">
   {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit', 'disabled']) }}
</ol>




</form>


@section('scripts')
<script type="">
        $(function(){
             $("#fecha_nacimiento").on('change', calcularEdad);
         });

         function calcularEdad() {

             fecha_nacimiento = $(this).val();
             var fecha_hoy = new Date();
             var cumpleanos = new Date(fecha_nacimiento);
             var edad = fecha_hoy.getFullYear() - cumpleanos.getFullYear();
             var m = fecha_hoy.getMonth() - cumpleanos.getMonth();

             if (m < 0 || (m === 0 && fecha_hoy.getDate() < cumpleanos.getDate())) {
                 edad--;
             }
             $("#edad").val(edad);

         }
         $(document).ready(function(){
            $(function printOnSelect(){
              //si el formulario va a ser utilizado para editar mandara 1 en una bandera, si el formulario sera utilizado para crear , mandara 0
              var flag={!! json_encode($flag ?? '') !!};
              if(flag){
                var docenteActual={!! json_encode($docenteActual ??'') !!};
                //console.log(docenteActual);
                var docentes = {!! json_encode($docentes) !!};
                //console.log(docentes[0]['nombre']);
                var comboSelect = document.getElementById('docentes_id');
                  for(var i=0;i<docentes.length;i++){
                    if(docenteActual===docentes[i]['nombre']){
                      //console.log(docenteActual===docentes[i]['nombre']);
                      document.getElementById("docentes_id").value = docentes[i]['id'];
                    }
                  }
                  var anioActual={!! json_encode($anioActual ??'') !!};
                  //console.log(anioActual);
                  var anios = {!! json_encode($anios) !!};
                  //console.log(anios);
                  for(var i=0;i<anios.length;i++){
                    if(anioActual===anios[i]['año']){
                      document.getElementById("anios_id").value = anios[i]['id'];
                    }
                  }

                  var asigActual={!! json_encode($gradoMasSeccion ??'') !!};
                  //console.log(asigActual);
                  var asignaciones = {!! json_encode($asignaciones) !!};
                  console.log(asigActual);
                  console.log(asignaciones[0]['grado']+asignaciones[0]['seccion']);
                  //console.log(asignaciones[0]['id']);
                  //console.log(asignaciones);
                  //var asigSeccion=asignaciones[0]['grado']+asignaciones[0]['seccion'];
                  for(var i=0;i<asignaciones.length;i++){
                    var asigSeccion=asignaciones[i]['grado']+asignaciones[i]['seccion'];
                    //console.log(asigSeccion);
                    //if(asigActual===asignaciones[i]['grado']){
                    console.log(asigActual===asigSeccion);
                    if(asigActual===asigSeccion){
                      document.getElementById("asignacions_id").value = asignaciones[i]['id'];
                    }
                  }
              }
            });
          });
</script>
<script src="{{ asset('js/validar-form-docente.js') }}"></script>

@stop




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
</script>
<script src="{{ asset('js/validar-form-docente.js') }}"></script>
@stop




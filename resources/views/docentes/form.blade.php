{!! csrf_field() !!}

<div class="row">
        <div class="col">
           <label>Imagen</label>

           <br><input type="file" name="imagen" class="form-control-file" class="text-rigth">
        </div>


</div>

<hr>

<div class="alert alert-primary" role="alert">
        Datos Docente
</div>


<form>


        <div class="row">
           <div class="col">
             {{ Form::label('nombre', 'Nombre')}}
              {{ Form::text('nombre',null,['class' => 'form-control']) }}

             </div>
               <div class="col">
                {{ Form::label('apellido', 'Apellidos')}}
                {{ Form::text('apellido',null,['class' => 'form-control']) }}
                </div>
                <div class="col">
                {{ Form::label('fecha_nacimiento', 'Fecha Nacimiento')}}
                {{ Form::date('fecha_nacimiento',null,['class' => 'form-control']) }}
              </div>
              <div class="col">
                {{ Form::label('telefono', 'Núm. Teléfono con Guión')}}
                {{ Form::text('telefono',null,['class' => 'form-control']) }}
              </div>
        </div>

        <div class="row">
                <div class="col">
                        {{ Form::label('edad', 'Edad')}}
                        {{ Form::text('edad',null,['class' => 'form-control',  'readonly' => 'true']) }}
                  </div>
                    <div class="col">
                        {{ Form::label('direccion', 'Direccion')}}
                        {{ Form::text('direccion',null,['class' => 'form-control']) }}
                   </div>



                <div class="col">
                {{ Form::label('dui', 'DUI con Guión')}}
                {{ Form::text('dui',null,['class' => 'form-control']) }}
                  </div>
                    <div class="col">
                        {{ Form::label('sexo', 'Sexo')}}
                        <div class="col">
                <select name="sexo" id= "sexo" class="form-control" required>
                    <option value=""> Sexo del docente </option>
                    @foreach ($arraySexo as $arreglo)
                    <option value="{{ $arreglo }}"> {{ $arreglo}}</option>
                    @endforeach
            </select>
          </div>
                   </div>



        </div>
        <div class="form-group">
            {!! Form::label('turnos_id', 'Seleccione el Turno') !!}
            <div class="form-group">
                <select name="turnos_id" id= "turnos_id" class="form-control" required>
                    <option value="">--Turnos--</option>
                    @foreach ($turnos as $turno)
                    <option value="{{ $turno->id }}"> {{ $turno->nombre_turno}}</option>
                    @endforeach
                </select>
            </div>
        </div>


<br>
<ol class="float-sm-right">
   {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success']) }}
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
@stop

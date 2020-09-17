{!! csrf_field() !!}


<div class="alert alert-primary" role="alert">
        Datos del Turno
</div>

<form id="formulario"> 

    <div class="row">
      <div class="col">
         {{ Form::label('nombre_turno', 'Turno')}}
            <select name="nombre_turno" class="form-control"  id="nombre_turno" onblur="validar_select(this)" required autofocus>
              <option value="">Seleccione un Turno</option>
                @foreach ($arrayTurno as $array)
                <option value="{{ $array }}"> {{ $array}}</option>
                @endforeach             
            </select>
            <div class="invalid-feedback" style="display:none">
                El Turno no debe quedar vacío.
             </div>
        </div>
    </div>
<br>

    <div class="row">
        <div class="col">
            {{ Form::label('hora_entrada', 'Hora Entrada')}}
            {{ Form::time('hora_entrada',null,['class' => 'form-control', 'id'=>'hora_entrada','onkeyup' => "validar_hora(this)", 'onblur' => "validar_hora(this)"]) }}
            <div class="invalid-feedback" style="display:none">
               Es necesario ingresar una hora 
            </div>
         </div>
         <div class="col">
            {{ Form::label('hora_salida', 'Hora Salida')}}
            {{ Form::time('hora_salida',null,['class' => 'form-control', 'id'=>'hora_salida','onkeyup' => "validar_hora(this)", 'onblur' => "validar_hora(this)"]) }}
            <div class="invalid-feedback" style="display:none">
               Es necesario ingresar una hora 
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
<script src="{{ asset('js/validar-form-turnos.js') }}"></script>
@stop





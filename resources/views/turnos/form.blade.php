{!! csrf_field() !!}


<div class="alert alert-primary" role="alert">
        Datos del Turno
</div>

<form>

    <div class="row">
      <div class="col">
         {{ Form::label('nombre_turno', 'Turno')}}
            <select name="nombre_turno" class="form-control"  required autofocus>
              <option value="">Seleccione un Turno</option>
                @foreach ($arrayTurno as $array)
                <option value="{{ $array }}"> {{ $array}}</option>
                @endforeach
            </select>
        </div>
    </div>
<br>

    <div class="row">
        <div class="col">
            {{ Form::label('hora_entrada', 'Hora Entrada')}}
            {{ Form::time('hora_entrada',null,['class' => 'form-control']) }}
         </div>
         <div class="col">
            {{ Form::label('hora_salida', 'Hora Salida')}}
            {{ Form::time('hora_salida',null,['class' => 'form-control']) }}
         </div>
     </div>

    </div>


 <br>
 <ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success']) }}
</ol>


</form>






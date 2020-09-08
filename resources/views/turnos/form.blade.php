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

       <div class="col-16">
         {{ Form::label('hora_entrada', 'Hora de Entrada')}}<br>
         {{ Form::time('hora_entrada', Carbon\Carbon::now()->isoFormat('H:mm:ss A')),['class' => 'form-control', 'required autofocus'] }}
        </div>

        <div class="col-16">
           {{ Form::label('hora_salida', 'Hora de Salida')}}<br>
           {{ Form::time('hora_salida', Carbon\Carbon::now()->isoFormat('H:mm:ss A')),['class' => 'form-control', 'required autofocus'] }}
        </div>
     </div>


 <br>
 <ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success']) }}
</ol>


</form>






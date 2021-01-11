@extends('admin.index2')

@section('title')
<h5><strong>Modificando: {{ $turno->nombre_turno }}</strong> </h5>
@endsection

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="{{ route('turnos.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
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

                <div id="msj_azul_fijo" class="alert alert-primary" role="alert">
                    Datos del Turno
            </div>

                <form method="POST"
                {!! Form::model($turno, ['route' => ['turnos.update', $turno->id],
                'method' =>'PUT'])  !!}
                
                <div class="row">
                  <div class="col">
                     {{ Form::label('nombre_turno', 'Turno')}}
                        <select name="nombre_turno" class="form-control"  id="nombre_turno" onblur="validar_select(this)" required autofocus>
                          <option value="">Seleccione un Turno</option>  
                          @foreach ($arrayTurno as $array)
                            <option value="{{ $array }}" @if($turno->nombre_turno === $array) selected='selected' @endif> {{ $array}}</option>
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
                        {{ Form::time('hora_entrada',$turno->hora_entrada,['class' => 'form-control', 'id'=>'hora_entrada','onkeyup' => "validar_hora(this)", 'onblur' => "validar_hora(this)", 'required' => 'required','autofocus'=>'autofocus']) }}
                        <div class="invalid-feedback" style="display:none">
                           Es necesario ingresar una hora 
                        </div>
                     </div>
                     <div class="col">
                        {{ Form::label('hora_salida', 'Hora Salida')}}
                        {{ Form::time('hora_salida',$turno->hora_salida,['class' => 'form-control', 'id'=>'hora_salida','onkeyup' => "validar_hora(this)", 'onblur' => "validar_hora(this)", 'required' => 'required','autofocus'=>'autofocus']) }}
                        <div class="invalid-feedback" style="display:none">
                           Es necesario ingresar una hora 
                        </div>
                     </div>
                 </div>
            
                </div>
            
            
             <br>
             <ol class="float-sm-right">
                {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit']) }}
            </ol>


                {!! Form::close() !!}
            </table>
        </div>
    </div>
</div>
@endsection


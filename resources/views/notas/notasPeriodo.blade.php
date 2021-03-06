@extends('admin.index2')
@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h4>Asignar las notas para la materia: <strong>{{$nombremateria}}</strong>  <br>Grado: <strong> {{$gradogrado}} {{$secciongrado}} {{$categoriagrado}} </strong></h4>
@endsection

@section('content')
<div class="container">
<div class="container-fluid">
<div class="container">
    <div class="container-fluid">
        <h4><strong>Digite las notas de las estudiantes y de click en guardar notas</strong></h4>
        <form   action="{{ route('notas.guardarNotasIngresadas', ['idgrado'=>$idgrado, 'idmateria'=>$idmateria, 'periodo'=>$periodoSelecc, 'anioID'=>$anioID])}}" method="POST"  >
            @csrf
        <br>
        <tr>
            <div class="form-group">
         <table class="table">
            <tr class="thead-dark">
                <th scope="col">Nombres Estudiante</th>
                <th scope="col">Apellidos Estudiante</th>
                @foreach ($notasLlenar as $nota)
                <th scope="col">Nota: {{$nota->tipo_nota}}</th>

                @endforeach
<th scope="col">Asistencia:</th>
                <th scope="col">Conducta:</th>
            </tr>

            <tbody>
                <?php $i=0;?>
                @foreach ($estudiantes as $estudiante)
                <tr>
                    <th>
                        <input type="hidden" id="idestu" name="idestu[]" value="{{$estudiante[$i]->id}}">
                        {{$estudiante[$i]->nombre}}
                    </th>
                    <th>
                        {{$estudiante[$i]->apellido}}
                    </th>
                    @foreach ($notasLlenar as $nota)
                    <input type="hidden"  id="tipo_nota" name="tipo_nota[]" value="{{$nota->tipo_nota}}">
                    <input type="hidden" id="ponderacion" name="ponderacion[]" value="{{$nota->ponderacion}}">
                    <th scope="col">{{ Form::number('valor_nota',null,['class' => 'form-control' , 'step'=>'0.01', 'id'=> 'valor_nota','name' => 'nombreNota[]' , 'placeholder' => 'digite la nota','onkeyup' => 'enabledButton();','onkeypress' => 'enabledButton();', 'required' => 'required','autofocus'=>'autofocus']) }}</th>

                    <div class="invalid-feedback" style="display:none">
                        El numero debe estar entre 0 y 10
                      </div>
                    @endforeach
                    <th scope="col">{{ Form::text('asistencia',null,['class' => 'form-control' , 'id'=> 'asistencia','name' => 'asistencia' , 'placeholder' => 'digite la Asistencia', 'required' => 'required','autofocus'=>'autofocus']) }}</th>
                    <th scope="col">{{ Form::text('conducta',null,['class' => 'form-control' , 'id'=> 'conducta','name' => 'conducta' , 'placeholder' => 'digite la conducta', 'required' => 'required','autofocus'=>'autofocus']) }}</th>

                </tr>
                <?php $i++;?>
                @endforeach
            </tbody>
        </table>
          </div>
          </tr>
      <br>
      <button id="btn_submit" disabled="true" type="submit" class="btn  btn-success float-sm-left">Guardar Notas</button>
    </form>
    </div>
</div>
      </div>
    </div>
</div>
</div>
@section('scripts')
<script src="{{ asset('js/validar-form-notas.js') }}"></script>
<script type="">


    function enabledButton(){
        document.getElementById("btn_submit").disabled = false;
    }


    </script>
@endsection
@endsection


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
        <form  action="{{ route('notas.guardarNotasIngresadas', ['idgrado'=>$idgrado, 'idmateria'=>$idmateria, 'periodo'=>$periodoSelecc])}}" method="POST"  >
            @csrf
        <br>
        <tr>
            <div class="form-group">
         <table class="table" id="tablaprueba">
            <tr class="thead-dark">
                <th scope="col">Nombres Estudiante</th>
                <th scope="col">Apellidos Estudiante</th>
                @foreach ($notasLlenar as $nota)
                <th scope="col">Nota: {{$nota->tipo_nota}}</th>
                @endforeach
            </tr>

            <tbody>
                <?php $i=0;?>
                @foreach ($estudiantes as $estudiante)
                <tr id="row" name="row">
                    <th>
                        <input type="hidden" id="idestu" name="idestu[]" value="{{$estudiante[$i]->id}}">
                        {{$estudiante[$i]->nombre}}
                    </th>
                    <th>
                        {{$estudiante[$i]->apellido}}
                    </th>
                    @foreach ($notasLlenar as $nota)
                    <th scope="col">{{ Form::number('tipo_nota',null,['class' => 'form-control', 'id'=> 'tipo_nota','name' => 'nombreNota[]' , 'placeholder' => 'digite la nota', 'required' => 'required','autofocus'=>'autofocus']) }}</th>
                    @endforeach
                </tr>
                <?php $i++;?>
                @endforeach
            </tbody>
        </table>
          </div>
          </tr>
      <br>
      <button type="submit" class="btn  btn-success float-sm-left" id="btnContinuar">Guardar Notas</button>
    </form>
    </div>
</div>
      </div>
    </div>
</div>
</div>

@endsection

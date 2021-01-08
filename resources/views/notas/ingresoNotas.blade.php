@extends('admin.index2')

@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h4>Asignar las notas para la materia: <strong>{{$materias[0]->nombre}}</strong>  <br>Grado: <strong> {{$grados[0]->grado}} {{$grados[0]->seccion}} {{$grados[0]->categoria}} </strong></h4>
@endsection
@section('content')
<div class="container">
<div class="container-fluid">
    <div class="card">
      <div class="card-header">
<div class="container">
    <div class="container-fluid">
        <h4><strong>Seleccione el periodo deseado y de click en el boton siguiente</strong></h4>
        <form  action="{{ route('notas.notasPeriodo', ['nombreMateria'=>$materias[0]->nombre,
            'idMateria'=>$materias[0]->id,
            'gradoGrado'=> $grados[0]->grado,
             'categoriaGrado'=>$grados[0]->categoria,
             'idGrado'=>$grados[0]->id,
             'seccionGrado'=> $grados[0]->seccion,
             'numperiodos'=>$numperiodos,
             'anioID'=>$anioId[0]->id])}}" method="POST"  >
            @csrf
        <br>
        @for($i=0; $i<$numperiodos;$i++)
        <input type="radio" name="periodo" id="periodo" value="{{$periodos[$i]->periodos_id}}"> Notas para el periodo {{$i+1}}<br>

        @endfor
      <br>
      <button type="submit" class="btn  btn-success float-sm-left" id="btnContinuar">Siguiente</button>
    </form>
    </div>
</div>

      </div>
    </div>
</div>
</div>

@endsection

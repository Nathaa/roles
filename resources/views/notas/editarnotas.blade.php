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
        <div class="card-body">
            <div class="form-group row">
              <div class="col-md-6">
                  <a href="{{ route('notas.confignotas') }}"><i class="fa fa-align-justify"></i> Listado Materias en curso</a>
              </div>
            </div>


<div class="container">
    <div class="container-fluid">
        <h4><strong>Seleccione el periodo y a continuacion las notas que tendra ese periodo</strong></h4>
        <form  action="{{ route('notas.guardarNotas', ['nombreMateria'=>$materias[0]->nombre,
        'idMateria'=>$materias[0]->id,
        'gradoGrado'=> $grados[0]->grado,
         'categoriaGrado'=>$grados[0]->categoria,
         'idGrado'=>$grados[0]->id,
         'seccionGrado'=> $grados[0]->seccion,
         'anioID'=>$anioId[0]->id]
         )}}" method="POST"  >
            @csrf
        @for($i=0; $i<$numperiodos;$i++)
        <input type="radio" name="periodo" id="periodo" value="{{$periodos[$i]->periodos_id}}"> Notas para el periodo {{$i+1}}<br>

        @endfor
        <br>

        <br>

        <br>
    <tr>
        <div class="form-group">
     <table class="table table-dark" id="tablaprueba">
        <tr>
            <th>Tipo de nota</th>
            <th>ponderacion</th>
        </tr>


    </table>
        <button type="button" class="btn btn-primary mr-2" onclick="agregarFila()">Agregar Nota</button>
        <button type="button" class="btn btn-danger" onclick="eliminarFila()">Eliminar Nota</button>

      </div>

      </tr>
      <br>
      <button type="submit" class="btn  btn-success float-sm-left" id="btnContinuar">Guardar Notas del periodo</button>
    </form>
    </div>
</div>

      </div>
    </div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script type="">

function agregarFila(){
  document.getElementById("tablaprueba").insertRow(-1).innerHTML
   = '<td> {{ Form::text('tipo_nota',null,['class' => 'form-control', 'id'=> 'tipo_nota','name' => 'nombreNota[]' , 'placeholder' => 'tipo de nota', 'required' => 'required','autofocus'=>'autofocus']) }}</td> <td> {{ Form::number('ponderacion',null,['class' => 'form-control', 'id'=>'ponderacion', 'name' => 'ponderacion[]' ,'placeholder' => 'ponderacion de la nota (ejemplo: 35 para 35%)', 'required' => 'required','autofocus'=>'autofocus' ]) }}</td>';
}

function eliminarFila(){
  var table = document.getElementById("tablaprueba");
  var rowCount = table.rows.length;
  //console.log(rowCount);

  if(rowCount <= 1)
    alert('No se puede eliminar el encabezado');
  else
    table.deleteRow(rowCount -1);
}


</script>

@stop


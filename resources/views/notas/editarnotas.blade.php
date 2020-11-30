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

            <?php
                $numperiodos++;
            ?>
<div class="container">
    <div class="container-fluid">
        <h4><strong>Seleccione el periodo y a continuacion las notas que tendra ese periodo</strong></h4>
        <form  action="{{ route('notas.guardarNotas')}}" method="POST"  >
            @csrf
        @for($i=1; $i<$numperiodos;$i++)
        <input type="radio" name="periodo" id="periodo{{$i}}" value="periodo{{$i}}"> Notas del perdiodo {{$i}}<br>

        @endfor
<br>
            <button type="submit" class="btn  btn-primary float-sm-left" id="btnContinuar">Guardar Notas del periodo</button>
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
    </form>
        <button type="button" class="btn btn-primary mr-2" onclick="agregarFila()">Agregar Nota</button>
        <button type="button" class="btn btn-danger" onclick="eliminarFila()">Eliminar Nota</button>
      </div>

      </tr>
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
var numfila = 0;
<?php
                $numfila= 0;
            ?>
function agregarFila(){
    <?php  $numfila ++; ?>

  document.getElementById("tablaprueba").insertRow(-1).innerHTML
   = '<td> {{ Form::text('tipo_nota',null,['class' => 'form-control', 'id'=> 'tipo_nota','name' => 'nombreNota[<script>numfila.val();</script>]' , 'placeholder' => 'tipo de nota', 'required' => 'required','autofocus'=>'autofocus']) }}</td> <td> {{ Form::number('ponderacion',null,['class' => 'form-control', 'id'=>'ponderacion', 'name' => 'ponderacion[<?php echo $numfila;?>]' ,'placeholder' => 'ponderacion de la nota', 'required' => 'required','autofocus'=>'autofocus' ]) }}</td>';

}

function eliminarFila(){
    numfila --;
  var table = document.getElementById("tablaprueba");
  var rowCount = table.rows.length;
  //console.log(rowCount);

  if(rowCount <= 2)
    alert('No se puede eliminar el encabezado');
  else
    table.deleteRow(rowCount -1);
}


</script>

@stop


@extends('admin.index2')

@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h4>Asistencia y Conducta de las Estudiantes: <br> Periodo: <strong> {{$nomperiodo}}</strong><br> Materia: <strong>{{$nomMateria}}</strong>  <br>Grado: <strong> {{$grado}} {{$seccion}} {{$categoria}} </strong></strong></h4>
@endsection
@section('content')
<div class="container">
<div class="container-fluid">
<div class="container">

    <div class="container-fluid">

<br>
        <tr>
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('notas.confignotas') }}"><i class="fa fa-align-justify"></i> Listado Materias en curso</a>
                </div>
              </div>
         <table class="table" id="tablaprueba">

            <tr class="thead-dark">
                <th scope="col" >Nombres Estudiante</th>
                <th scope="col">Apellidos Estudiante</th>
                <?php $i=0;?>
                @foreach ($estudiantes as $estudiante)


                    <?php
                    if($notasCount==0){

                    }else{
                    if (str_contains($notas[$i]->estudiantes_id, $estudiante[$i]->id)) {
                        echo  "<th>Conducta: </th>";
                        echo  "<th>Asistencia:<br> </th>";
                    }}?>

                <?php $i++;?>
                    @endforeach




            </tr>

            <tbody>
                <?php $i=0;?>
                @foreach ($estudiantes as $estudiante)
                <tr>
                    <th>
                        {{$estudiante[$i]->nombre}}
                    </th>
                    <th>
                        {{$estudiante[$i]->apellido}}
                    </th>




                    <?php
                    if($notasCount==0){

                        }else{ if (str_contains($notas[$i]->estudiantes_id, $estudiante[$i]->id)) {
                        echo  "<th>";  echo $notas[$i]->conducta;  echo "<br> </th>";
                        echo  "<th>";  echo $notas[$i]->asistencia;  echo "<br> </th>";
                    }}?>


                </tr>
                <?php $i++;?>
                @endforeach
            </tbody>
        </table>

          </tr>
      <br>

    </div>
</div>
      </div>
    </div>
</div>
</div>

@endsection

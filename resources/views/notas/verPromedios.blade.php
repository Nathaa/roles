@extends('admin.index2')

@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h4>Promedios de las Estudiantes: <br> Materia: <strong>{{$nomMateria}}</strong>  <br>Grado: <strong> {{$grado}} {{$seccion}} {{$categoria}} </strong></strong></h4>
@endsection
@section('content')
<div class="container">
<div class="container-fluid">
<div class="container">
    <div class="container-fluid">

        <form  action="" method="POST"  >
            @csrf
        <br>
        <tr>
            <div class="form-group">
         <table class="table" id="tablaprueba">
            <tr class="thead-dark">
                <th scope="col" >Nombres Estudiante</th>
                <th scope="col">Apellidos Estudiante</th>

                <th scope="col">Promedio periodo 1</th>
                <th scope="col">Promedio periodo 2</th>
                <th scope="col">Promedio periodo 3</th>
                <th scope="col">Promedio periodo 4</th>

                <th scope="col">Promedio Final</th>

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
                    @foreach ($promedios as $promedio)
                    <?php $j=1; if(str_contains($promedio->estudiantes_id, $estudiante[$i]->id)){
                        echo "<th>$promedio->prom_per_1</th>";
                        $j++;
                    }?>
                    <?php $j=1; if(str_contains($promedio->estudiantes_id, $estudiante[$i]->id)){
                        echo "<th>$promedio->prom_per_2</th>";
                        $j++;
                    }?>
                    <?php $j=1; if(str_contains($promedio->estudiantes_id, $estudiante[$i]->id)){
                        echo "<th>$promedio->prom_per_3</th>";
                        $j++;
                    }?>
                        <?php $j=1; if(str_contains($promedio->estudiantes_id, $estudiante[$i]->id)){
                            echo "<th>$promedio->prom_per_4</th>";
                            $j++;
                        }?>


<?php $j=1; if(str_contains($promedio->estudiantes_id, $estudiante[$i]->id)){
    echo "<th>$promedio->prom_final</th>";
    $j++;
}?>
                    </th>
                    @endforeach
                </tr>
                <?php $i++;?>
                @endforeach
            </tbody>
        </table>
          </div>
          </tr>
      <br>
    </form>
    </div>
</div>
      </div>
    </div>
</div>
</div>

@endsection

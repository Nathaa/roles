@extends('admin.index2')

@section('title')
<h3>Configurar las notas de las materias que imparte</h3>
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
    <table class="table table-bordered thead-dark table-hover table-sm">
        <tr>
          <th scope="col">Materia</th>
          <th scope="col">Grado</th>
          <th scope="col">¿Establecidas las notas?</th>
          <th colspan="3">&nbsp;Asignar # de notas</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($materias as $materia)
           <tr>
            <td width="35%">{{$materia->nombre}}</td>


                <td width="35%">
                    {{$materia->grado}}
                    {{ $materia->seccion}}
                    {{ $materia->categoria}}
                </td>
                <td width="15%">
                    <?php if($materia->nombre == "Matematica"){
                        echo "<font color='#ff0000'>"; echo "matematica en rojo"; echo" </font>";
                    }?>
                </td>
                <td>
                    @can('notas.editarnotas')

                    <a href="{{ route('notas.editarnotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre]) }}" class="btn btn-default btn-flat" title="Editar">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                      </a>
                      @endcan
                    </td>
           </tr>

         @endforeach
        </tbody>
      </table>

      </div>
    </div>
</div>
</div>
</div>
@endsection

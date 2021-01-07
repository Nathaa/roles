@extends('admin.index2')

@section('title')

@endsection
@section('content')
<div class="container">
<div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <div class="card-body">
            <h3>Configurar y digitar las notas de las materias que imparte</h3>
            <div class="form-group row">
              <div class="col-md-6">
                  <a href="{{ route('notas.confignotas') }}"><i class="fa fa-align-justify"></i> Listado Materias en curso</a>
              </div>
            </div>

    <table class="table table-bordered thead-dark table-hover table-sm">
    <thead>
        <tr>
          <th scope="col">Materia</th>
          <th scope="col">Grado</th>
          <th scope="col">Digitar Notas de la materia</th>
          <th scope="col">Asignar # de notas</th>
          <th scope="col">Ver Notas y Promedios</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($materias as $materia)
           <tr>
            <td width="30%">{{$materia->nombre}}</td>

                <td width="30%">
                    {{$materia->grado}}
                    {{ $materia->seccion}}
                    {{ $materia->categoria}}
                </td>
                <td width="15%">
                    @can('notas.ingresoNotas')
                    <a href="{{ route('notas.ingresoNotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre]) }}" class="btn btn-default btn-flat" title="IngresarNotas">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                      </a>
                      @endcan
                </td>
                <td>
                    @can('notas.editarnotas')

                    <a href="{{ route('notas.editarnotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre]) }}" class="btn btn-default btn-flat" title="Editar">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                      </a>
                      @endcan
                </td>

                <td>
                    @can('notas.verPromedios')
                    <a href="{{ route('notas.verPromedios', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre, 'idgrado'=>$materia->id, 'categoria'=>$materia->categoria]) }}" class="btn btn-default btn-flat" title="ver">
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

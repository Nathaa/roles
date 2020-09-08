@extends('admin.index2')


@section('content')

<h6>
    @if($search)
      <div class="alert alert-info" role="alert">
        Resultados de la busqueda {{ $search }}
      </div>
      @endif
</h6>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">

                @can('materias.create')
                     <a href="{{ route('materias.create') }}"> <button type="button" class="btn btn-dark btn-xs">
                    <i class="fas fa-plus"></i>Crear Nueva </button> </a>
                @endcan
            </div>


            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <a href="{{ route('materias.index') }}"><i class="fa fa-align-justify"></i> Listado Materias</a>
                    </div>
                </div>
                <table class="table table-bordered thead-dark table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Nombre de la Materia</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th colspan="3">&nbsp;Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($materias as $materia)
                    <tr>
                        <td>{{ $materia->nombre  }}</td>
                        <td>{{ $materia->descripcion  }}</td>
                            <td>
                                    @if ($materia->estado == '1')
                                    <span class="badge badge-success">Activo</span>
                                    @else
                                    <span class="badge badge-danger">Desactivado</span>
                                    @endif
                            </td>
                            <td width="10px">
                            @can('materias.edit')

                            <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-default btn-flat" title="Editar">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                              </a>
                              @endcan
                            </td>
                            <td width="10px">
                            @can('materias.show')

                            <a href="{{ route('materias.show', $materia->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                                <i class="fas fa-eye" aria-hidden="true"></i>
                              </a>

                            @endcan
                            </td>
                            <td width="10px">
                            @can('materias.destroy')
                            {!! Form::open(['route' => ['materias.destroy', $materia->id],
              'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el expediente?")']) !!}
              <button class="btn btn-danger" class="btn btn-info btn-flat" title="Eliminar">
                <i class="fas fa-trash" aria-hidden="true"></i>
              </button>
            {!! Form::close() !!}
                            @endcan
                            </td>
                        </tr>


                        @endforeach



                    </tbody>
                </table>

            </div>

        </div>

    </div>


@endsection

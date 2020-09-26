@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
  </ol>
  @if(Session::has('success_message'))
    <div id="msj_verde" class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ Session::get('success_message') }}
    </div>
  @endif

  @if(Session::has('info_message'))
    <div id="msj_azul" class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ Session::get('info_message') }}
    </div>
  @endif

  @if(Session::has('danger_message'))
    <div id="msj_rojo" class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ Session::get('danger_message') }}
    </div>
  @endif
</div>
@endsection

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
          'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar la materia?")']) !!}
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
            <br>
            <div class="row">
              <div class="mr-auto">
                {{$materias->links()}}
              </div>
            </div>
        </div>

    </div>

</div>


@endsection

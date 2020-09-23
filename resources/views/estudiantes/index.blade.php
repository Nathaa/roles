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


@section('title')

@endsection

@section('content')
<div class="container">

  <h6>
    @if($search)
    <div class="alert alert-info" role="alert">
      Los resultados de tu busqueda {{ $search }} son
    </div>
    @endif
  </h6>

  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        @can('estudiantes.create')
             <a href="{{ route('estudiantes.create') }}"> <button type="button" class="btn btn-dark btn-xs">
            <i class="fas fa-plus"></i>Crear Expediente </button> </a>
        @endcan
      </div>

      <div class="card-body">
        <div class="form-group row">
            <div class="col-md-6">
              <a href="{{ route('estudiantes.index') }}"><i class="fa fa-align-justify"></i> Listado estudiantes</a>
            </div>
        </div>
        <table class="table table-bordered thead-dark table-hover table-sm">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th colspan="3">&nbsp;Opciones</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($estudiantes as $estudiante)
            <tr>
              <td>{{$estudiante->nombre}}</td>
              <td>{{$estudiante->apellido}}</td>
              <td width="10px">
                @can('estudiantes.edit')
                <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-default btn-flat" title="Editar">
                  <i class="fa fa-wrench" aria-hidden="true"></i>
                </a>
                @endcan
              </td>
              <td width="10px">
                @can('estudiantes.show')
                <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                  <i class="fas fa-eye" aria-hidden="true"></i>
                </a>
                @endcan
              </td>
              <td width="10px">
                @can('estudiantes.destroy')
                {!! Form::open(['route' => ['estudiantes.destroy', $estudiante->id],
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
        <br>
            <div class="row">
              <div class="mr-auto">
                {{$estudiantes->links()}}
              </div>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection
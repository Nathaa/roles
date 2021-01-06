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
</div><!-- /.col -->
@endsection


@section('title')
@endsection


@section('content')
<div class="container">

    <h6>

 </h6>

  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        @can('docentegrados.create')
             <a href="{{ route('docentegrados.create') }}"> <button type="button" class="btn btn-dark btn-xs">
            <i class="fas fa-plus"></i>Crear Asignacion Docente-Grado </button> </a>
        @endcan
      </div>
      <div class="card-body">
        <div class="form-group row">
          <div class="col-md-6">
              <a href="{{ route('docentegrados.index') }}"><i class="fa fa-align-justify"></i> Listado Docentes-Grados</a>
          </div>
        </div>
        <table class="table table-bordered thead-dark table-hover table-sm">
          <tr>
            <th scope="col">ID Docente</th>
            <th scope="col">ID Asignacion</th>
            <th scope="col">ID Año</th>
            <th colspan="3">&nbsp;Opciones</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($docentegrados as $docentegrado)
             <tr>
              <td>{{$docentegrado->nombre}}</td>
              <td>{{$docentegrado->grado}}{{$docentegrado->seccion}}</td>
              <td>{{$docentegrado->año}}</td>

              <td width="10px">
                  @can('docentegrados.edit')

                  <a href="{{ route('docentegrados.edit', $docentegrado->id) }}" class="btn btn-default btn-flat" title="Editar">
                      <i class="fa fa-wrench" aria-hidden="true"></i>
                    </a>
                    @endcan
                  </td>
                  <td width="10px">
                  @can('docentegrados.show')

                  <a href="{{ route('docentegrados.show', $docentegrado->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                      <i class="fas fa-eye" aria-hidden="true"></i>
                    </a>

                  @endcan
                  </td>
                  <td width="10px">
                  @can('docentegrados.destroy')
                  {!! Form::open(['route' => ['docentegrados.destroy', $docentegrado->id],
    'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar la asignacion?")']) !!}
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

              </div>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection




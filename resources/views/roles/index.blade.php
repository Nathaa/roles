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
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">

                @can('roles.create')
                     <a href="{{ route('roles.create') }}"> <button type="button" class="btn btn-dark btn-xs">
                    <i class="fas fa-plus"></i>Crear Rol </button> </a>
                @endcan
            </div>


            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <a href="{{ route('roles.index') }}"><i class="fa fa-align-justify"></i> Listado de Roles</a>
                    </div>
                </div>
                <table class="table table-bordered thead-dark table-hover table-sm">
                            <tr>

                                <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>

                            <th colspan="3">&nbsp;Opciones</th>


                            </tr>


                    <tbody>
                        @foreach($roles as $role)
                        <tr>

                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>

                            <td width="10px">
                                @can('roles.edit')

                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-default btn-flat" title="Editar">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>
                                  </a>
                                  @endcan
                                </td>
                                <td width="10px">
                                @can('roles.show')

                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                  </a>

                                @endcan
                                </td>
                                <td width="10px">
                                @can('roles.destroy')
                                {!! Form::open(['route' => ['roles.destroy', $role->id],
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
                {{$roles->links()}}
              </div>
            </div>
            </div>
    </div>
</div>
</div>
@endsection

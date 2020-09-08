@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">


  </ol>
</div><!-- /.col -->
@endsection


@section('title')

@endsection

@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">

            </div>


            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <a href="{{ route('usuarios.index') }}"><i class="fa fa-align-justify"></i> Listado Usuarios</a>
                    </div>
                </div>
                <table class="table table-bordered thead-dark table-hover table-sm">
        <tr>

          <th scope="col">Nombre</th>
          <th scope="col">Correo</th>

          <th colspan="3">&nbsp;Opciones</th>
      </thead>
      <tbody>
         @foreach ($users as $user)
          <tr>

            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>

            <td width="10px">
                @can('usuarios.edit')

                <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
                  @endcan
                </td>
                <td width="10px">
                @can('usuarios.show')

                <a href="{{ route('usuarios.show', $user->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>

                @endcan
                </td>
                <td width="10px">
                @can('usuarios.destroy')
                {!! Form::open(['route' => ['usuarios.destroy', $user->id],
  'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el expediente?")']) !!}
  <button class="btn btn-sm btn-danger">
      Eliminar
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
</div>

@endsection

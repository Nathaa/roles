@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('roles.create') }}">Crear Nuevo Rol</a></li>

  </ol>
</div><!-- /.col -->
@endsection


@section('title')
<h3>Lista de Roles</h3>
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-boady">
                    <table class="table table-bordered table-hover">

                            <tr>

                                <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>




                            </tr>


                    <tbody>
                        @foreach($roles as $role)
                        <tr>

                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td width="10">
                               @can('roles.show')
                                 <a href="{{ route('roles.show', $role->id) }}"
                                 class="btn btn-sm btn-default">
                                    Ver
                                 </a>
                                @endcan

                            </td>
                            <td width="10">

                                @can('roles.edit')
                                      <a href="{{ route('roles.edit', $role->id) }}"
                                      class="btn btn-sm btn-default">
                                         Editar
                                      </a>
                                @endcan
                            </td>
                            <td width="10">
                                @can('roles.destroy')
                                     {!! Form::open(['route' => ['roles.destroy', $role->id],
                                     'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el rol?")']) !!}
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

@endsection

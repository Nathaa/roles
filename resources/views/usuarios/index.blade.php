@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">


  </ol>
</div><!-- /.col -->
@endsection


@section('title')
<h3>Lista de usuarios</h3>
@endsection

@section('content')
<div class="container">
<div class="card">

   <div class="card-boady">
    <table class="table table-bordered table-hover">
        <tr>

          <th scope="col">Nombre</th>
          <th scope="col">Correo</th>
          <th scope="col">Rol</th>
          <th scope="col">Permisos</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
         @foreach ($users as $user)
          <tr>

            <td><a href="{{ route('usuarios.show', $user->id)}}">{{$user->name}}</td></a>
            <td>{{$user->email}}</td>
            <td>roles</td>
            <td>permisos</td>
              <td>
                  {!! Form::open(['route' => ['usuarios.destroy', $user->id],
                  'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el usuario")']) !!}
                  <button class="btn btn-sm btn-danger">
                      Eliminar
                  </button>
                {!! Form::close() !!}
              </td>


          </tr>
        @endforeach
      </tbody>
  </table>
   </div>
</div>
</div>

@endsection

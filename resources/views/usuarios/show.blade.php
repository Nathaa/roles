@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="{{ route('usuarios.edit', $user->id)}}">Editar Usuario</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('usuarios.index', $user->id)}}">Regresar atras</a></li>
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h3>Informacion del Usuario: {{ $user->name }}</h3>
@endsection
@section('content')

            <div class="container">

                        <img width="150" src="{{ $user->imagen }}" class="img-responsive">
             </div>
                    <div class="container">
                        <div class="card">

                           <div class="card-boady">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                    <th>Datos Personales Alumnas</th>
                                    </tr>

                                   </thead>
                            </table>
                        <table class="table table-bordered table-hover">


                            <tbody>


                                  <tr>
                                     <th scope="row"><strong>Nombre:</strong></th>
                                     <td> <p> {{$user->name}}</p></td>
                                 </tr>
                                  <tr>
                                      <th scope="row"><strong>Apellido: </strong></th>
                                      <td><p> {{ $user->apellidos }}</p></td>
                                  </tr>
                                   <tr>
                                       <th scope="row"><strong>Email:</strong></th>
                                       <td><p> {{$user->email}}</p></td>
                                 </tr>

                                  <tr>
                                       <th scope="row"><strong>Contraseña:</strong></th>
                                       <td> <p> {{$user->password}}</p></td>
                                 </tr>



                           </tbody>
                       </table>

            </div>
        </div>
    </div>

@endsection

@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('usuarios.edit')
    <li class="breadcrumb-item active"><a href="{{ route('usuarios.edit', $user->id)}}"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Usuario</button></a></li>
        @endcan
        <li class="breadcrumb active"><a href="{{ route('usuarios.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h5><strong>{{ $user->name  }}</strong> </h5>
@endsection
@section('content')

            <div class="container">

                        <img width="150" src="{{ $user->imagen }}" class="img-responsive">
             </div>
                    <div class="container">
                        <div class="card">

                           <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-primary">
                                    <tr>
                                    <th>Datos Personales Usuarios</th>
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

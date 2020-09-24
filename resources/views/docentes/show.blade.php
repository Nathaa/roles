@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('docentes.edit')
        <li class="breadcrumb-item active"><a href="{{ route('docentes.edit', $docente->id)}}"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Docente</button></a></li>
        @endcan
        <li class="breadcrumb active"><a href="{{ route('docentes.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h5><strong>{{ $docente->nombre  }} {{ $docente->apellido  }}</strong> </h5>
@endsection


@section('content')


                    <div class="container">

                        <img width="150" src="{{ $docente->imagen }}" class="img-responsive">
                           </div>
                            <div class="container">
                                <th scope="row"></th>
                                <p align="right"><strong>Fecha de Creacion: </strong> {{ Carbon\Carbon::parse($docente->created_at)->format('d/m/Y') }}</p>

                                <div class="card">

                                   <div class="card-body">

                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                            <th>Datos Personales del Docente</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <td><p><strong>Nombre: </strong> {{ $docente->nombre }}</p></td>
                                            <td><p><strong>Apellido: </strong> {{ $docente->apellido }}</p></td>
                                                <td><p><strong>Fecha Nacimiento: </strong> {{ Carbon\Carbon::parse($docente->fecha_nacimiento)->format('d/m/Y') }}</p></td>
                                    </tr>
                                    <tr>

                                                    <td><p><strong>Edad:</strong> {{ $docente->edad }}</p></td>
                                                    <td><p><strong>Direccion: </strong> {{ $docente->direccion }}</p></td>
                                                    <td><p><strong>DUI:</strong> {{ $docente->dui }}</p></td>
                                    </tr>
                                    <tr>


                                                    <td><p><strong>Sexo: </strong> {{ $docente->sexo }}</p></td>
                                                    <td><p><strong>Telefono :</strong> {{ $docente->telefono }}</p></td>
                                                    <td><p><strong>Turno que imparte :</strong> {{ $turno->nombre_turno }}</p></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>


@endsection

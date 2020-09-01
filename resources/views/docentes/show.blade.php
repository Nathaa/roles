@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('docentes.edit')
    <li class="breadcrumb-item active"><a href="{{ route('docentes.edit', $docente->id)}}">Editar Docente</a></li>
    @endcan
    @can('docentes.index')
    <li class="breadcrumb-item active"><a href="{{ route('docentes.index', $docente->id)}}">Regresar atras</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h3>Docente : {{ $docente->nombre  }} {{ $docente->apellido  }} </h3>
@endsection


@section('content')


                    <div class="container">

                        
                           </div>
                            <div class="container">
                                <th scope="row"></th>
                                <p align="right"><strong>Fecha de Creacion: </strong> {{ Carbon\Carbon::parse($docente->created_at)->format('d/m/Y') }}</p>

                                <div class="card">

                                   <div class="card-boady">

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
                                                    <td><p><strong>Telefono :</strong>{{ $docente->telefono }}</p></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            

@endsection

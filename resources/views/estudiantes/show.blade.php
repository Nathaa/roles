@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('estudiantes.edit')
        <li class="breadcrumb-item active"><a href="{{ route('estudiantes.edit', $estudiante->id)}}"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Estudiante</button></a></li>
        @endcan
        <li class="breadcrumb active"><a href="{{ route('estudiantes.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h5><strong>{{ $estudiante->nombre  }} {{ $estudiante->apellido  }}</strong> </h5>
@endsection


@section('content')


                    <div class="container">

                        <img width="150" src="{{ $estudiante->imagen }}" class="img-responsive">
                           </div>
                            <div class="container">
                                <th scope="row"></th>
                                <p align="right"><strong>Fecha de Creacion: </strong> {{ Carbon\Carbon::parse($estudiante->created_at)->format('d/m/Y') }}</p>

                                <div class="card">

                                   <div class="card-body">

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
                                        <td><p><strong>Nombre: </strong> {{ $estudiante->nombre }}</p></td>
                                            <td><p><strong>Apellido: </strong> {{ $estudiante->apellido }}</p></td>
                                                <td><p><strong>Fecha Nacimiento: </strong> {{ Carbon\Carbon::parse($estudiante->fecha_nacimiento)->format('d/m/Y') }}</p></td>
                                    </tr>
                                    <tr>

                                                    <td><p><strong>Edad:</strong> {{ $estudiante->edad }}</p></td>
                                                    <td><p><strong>Direccion: </strong> {{ $estudiante->direccion }}</p></td>
                                                    <td><p><strong></strong></p></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="card">
                   <div class="card-body">
                        <table class="table table-bordered table-hover">
                           <thead class="bg-primary">
                            <tr>
                            <th>Datos Personales del Responsable</th>
                            </tr>

                           </thead>
                        </table>
                        <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td><p><strong>Nombre: </strong> {{ $estudiante->encargado }}</p></td>
                                <td><p><strong>Parentesco: </strong> {{ $estudiante->parentesco }}</p></td>
                                    <td><p><strong>Telefono Emergencia: </strong> {{ $estudiante->telefono_emergencia }}</p></td>
                              </tr>
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>
            <div class="container">
                <div class="card">
                   <div class="card-body">
                        <table class="table table-bordered table-hover">
                           <thead class="bg-primary">
                            <tr>
                            <th>Datos de Enfermedades</th>
                            </tr>

                           </thead>
                        </table>
                        <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td><p><strong>Padecimiento: </strong> {{ $estudiante->padecimientos }}</p></td>
                            <td><p><strong>Descripcion Padecimiento: </strong> {{ $estudiante->descripcion_padecimiento }}</p></td>
                                <td><p><strong>Alergia Medicamente: </strong> {{ $estudiante->alergia_medicamento }}</p></td>
                              </tr>
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

            <div class="container">
                <div class="card">
                   <div class="card-body">
                        <table class="table table-bordered table-hover">
                           <thead class="bg-primary">
                            <tr>
                            <th>Datos Personales de Padres</th>
                            </tr>

                           </thead>
                        </table>
                        <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>

                                <td><p><strong>Nombre padre: </strong> {{ $estudiante->nombre_padre }}</p></td>
                                <td><p><strong>Profesion padre: </strong> {{ $estudiante->profesion_padre }}</p></td>
                                <td><p><strong>Telefono padre: </strong> {{ $estudiante->telefono_padre }}</p></td>
                              </tr>
                              <tr>
                              <td><p><strong>Nombre Madre: </strong> {{ $estudiante->nombre_madre }}</p></td>
                                <td><p><strong>Profesion Madre: </strong> {{ $estudiante->profesion_madre }}</p></td>
                                    <td><p><strong>Telefono Madre: </strong> {{ $estudiante->telefono_madre }}</p></td>
                              </tr>
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

@endsection

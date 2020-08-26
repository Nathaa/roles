@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('periodos.edit')
    <li class="breadcrumb-item active"><a href="{{ route('periodos.edit', $periodo->id)}}">Editar Periodo</a></li>
    @endcan
    @can('periodos.index')
    <li class="breadcrumb-item active"><a href="{{ route('periodos.index', $periodo->id)}}">Regresar atras</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h3>Periodo: {{ $periodo->nombre  }} </h3>
@endsection


@section('content')


                    <div class="container">


                           </div>
                            <div class="container">
                                <th scope="row"></th>


                                <div class="card">

                                   <div class="card-boady">

                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                            <th>Datos del Periodo</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <th scope="row"><strong>Nombre:</strong></th>
                                        <td> <p> {{$periodo->nombre}}</p></td>
                                        <th scope="row"><strong>Duracion: </strong></th>
                                         <td><p> {{ $periodo->duracion }}</p></td>
                                    </tr>
                                     <tr>

                                     </tr>
                                      <tr>
                                          <th scope="row"><strong>Fecha de Inicio:</strong></th>
                                          <td><p> {{$periodo->fecha_inicio}}</p></td>
                                          <th scope="row"><strong>Fecha de Finalizacion:</strong></th>
                                          <td> <p> {{$periodo->fecha_fin}}</p></td>
                                    </tr>

                                     <tr>

                                    </tr>


                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

@endsection

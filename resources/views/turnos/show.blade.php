@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('turnos.edit')
    <li class="breadcrumb-item active"><a href="{{ route('turnos.edit', $turno->id)}}">Editar Periodo</a></li>
    @endcan
    @can('turnos.index')
    <li class="breadcrumb-item active"><a href="{{ route('turnos.index', $turno->id)}}">Regresar atras</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h3>Turno: {{ $turno->nombre_turno  }} </h3>
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
                                            <th>Datos del Turno</th>
                                            </tr>

                                        </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <th scope="row"><strong>Nombre del Turno:</strong></th>
                                        <td> <p> {{ $turno->nombre_turno }}</p></td>
                                        <th scope="row"><strong>Hora de Entrada: </strong></th>
                                         <td><p> {{ Carbon\Carbon::parse($turno->hora_entrada)->isoFormat('H:mm A') }}</p></td>
                                    </tr>
                                     <tr>

                                     </tr>
                                      <tr>
                                        <th scope="row"><strong>Hora de Salida: </strong></th>
                                        <td><p> {{ Carbon\Carbon::parse($turno->hora_salida)->isoFormat('H:mm A') }}</p></td>

                                        <th scope="row"><strong>Cantidad de Horas: </strong></th>
                                        <td><p> {{ Carbon\Carbon::parse($turno->hora_entrada)->diff(Carbon\Carbon::parse($turno->hora_salida))->format("%H horas") }}</p></td>
                                      </tr>

                                    <tr>
                                        
                                    </tr>


                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

@endsection

@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    @can('periodos.edit')
    <li class="breadcrumb-item active"><a href="{{ route('periodos.edit', $periodo->id)}}"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar periodo</button></a></li>
    @endcan
    <li class="breadcrumb active"><a href="{{ route('periodos.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h5><strong>{{ $periodo->nombre  }}</strong> </h5>
@endsection


@section('content')


                    <div class="container">


                           </div>
                            <div class="container">
                                <th scope="row"></th>


                                <div class="card">

                                   <div class="card-body">

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
                                        <td> <p> {{$periodo->nombre_periodo}}</p></td>
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

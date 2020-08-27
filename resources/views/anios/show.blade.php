@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('anios.edit')
    <li class="breadcrumb-item active"><a href="{{ route('anios.edit', $anio->id)}}">Editar Año</a></li>
    @endcan
    @can('anios.index')
    <li class="breadcrumb-item active"><a href="{{ route('anios.index', $anio->id)}}">Regresar atras</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h3>Anio: {{ $anio->nombre  }} </h3>
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
                                            <th>Datos del Año</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <th scope="row"><strong>Año lectivo:</strong></th>
                                        <td> <p> {{$anio->nombre}}</p></td>
                                        <th scope="row"><strong>Duracion: </strong></th>
                                         <td><p> {{ $anio->duracion }}</p></td>
                                    </tr>
                                     <tr>

                                     </tr>

                                     <tr>

                                    </tr>


                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

@endsection
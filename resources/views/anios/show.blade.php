@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('anios.edit')
    <li class="breadcrumb-item active"><a href="{{ route('anios.edit', $anio->id)}}"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Años</button></a></li>
    @endcan
    <li class="breadcrumb active"><a href="{{ route('anios.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h5><strong>{{ $anio->nombre  }} {{ $anio->año}}</strong> </h5>
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
                                            <th>Datos del Año</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <th scope="row"><strong>Año lectivo:</strong></th>
                                        <td><p> {{ $anio->año }}</p></td>
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

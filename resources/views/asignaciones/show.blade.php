@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('asignaciones.edit')
    <li class="breadcrumb-item active"><a href="{{ route('asignaciones.edit', $asignaciones->id)}}"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar grado</button></a></li>
    @endcan
    <li class="breadcrumb active"><a href="{{ route('asignaciones.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h5><strong>{{ $grados->grado  }} {{$grados->seccion}} </strong> </h5>

@endsection


@section('content')



                            <div class="container">
                                <th scope="row"></th>


                                <div class="card">

                                   <div class="card-body">

                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                            <th>Datos de Asignacion</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <td><p><strong>Grado: </strong> {{ $grados->grado }}{{ $grados->seccion }}</p></td>
                                            <td><p><strong>Categoria: </strong> {{ $grados->categoria }}</p></td>
                                                <td><p><strong>Materia: </strong> {{ $materias->nombre }}</p></td>
                                                <td><p><strong>Periodo: </strong> {{ $periodos->nombre_periodo }}</p></td>
                                    </tr>

                                </tbody>
                            </table>
                            </div>
                </div>
            </div>





@endsection

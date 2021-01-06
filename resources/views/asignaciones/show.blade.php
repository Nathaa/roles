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
<h5><strong></strong> </h5>

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
                                        @foreach ($grados as $grado)
                                        <td><p><strong>Grado: </strong> {{ $grado->grado }}{{ $grado->seccion }}</p></td>
                                            <td><p><strong>Categoria: </strong> {{ $grado->categoria }}</p></td>
                                            @endforeach
                                            @foreach ($materias as $materia)
                                            <td><p><strong>Materia: </strong> {{ $materia->nombre }}</p></td>
                                            @endforeach

                                    </tr>

                                </tbody>
                            </table>
                            </div>
                </div>
            </div>





@endsection

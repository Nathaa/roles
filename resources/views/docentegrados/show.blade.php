@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('docentes.edit')
        <li class="breadcrumb-item active"><a href="{{ route('docentegrados.edit', $docentegrado->id)}}"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Asignacion</button></a></li>
        @endcan
        <li class="breadcrumb active"><a href="{{ route('docentegrados.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div><!-- /.col -->
@endsection



@section('content')


                    <div class="container">

                        
                           </div>
                            <div class="container">
                                <th scope="row"></th>
                                <p align="right"><strong>Fecha de Creacion: </strong> {{ Carbon\Carbon::parse($docentegrado->created_at)->format('d/m/Y') }}</p>

                                <div class="card">

                                   <div class="card-body">

                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                            <th>Datos Asignacion Docente-Grado</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <td><p><strong>Docente: </strong> {{ $docente->nombre }} {{ $docente->apellido }}</p></td>
                                        <td><p><strong>Grado: </strong> {{ $grado->grado }} {{ $grado->seccion }}</p></td>
                                                <td><p><strong>Año: </strong> {{ $anio->año }}</p></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>


@endsection

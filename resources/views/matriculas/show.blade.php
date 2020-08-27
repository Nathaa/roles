@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('matriculas.edit')
    <li class="breadcrumb-item active"><a href="{{ route('matriculas.edit', $matricula->id)}}">Editar Matrícula</a></li>
    @endcan
    @can('matriculas.index')
    <li class="breadcrumb-item active"><a href="{{ route('matriculas.index', $matricula->id)}}">Regresar atras</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h3>Matricula: {{ $matricula->nombre  }} </h3>
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
                                            <th>Datos de la Matricula</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <th scope="row"><strong>Nombre:</strong></th>
                                        <td> <p> {{$matricula->nombre}}</p></td>
                                    </tr>
                                    <tr>

                                    </tr>
                                    <tr>
	                                    <th scope="row"><strong>Descripción:</strong></th>
	                                    <td><p> {{$matricula->descripcion}}</p></td>
                                    </tr>

                                     <tr>

                                    </tr>

                        </tbody>
                    </table>
                   </div>
                </div>
            </div>

@endsection

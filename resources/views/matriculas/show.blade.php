@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('matriculas.edit')
        <li class="breadcrumb-item active"><a href="{{ route('matriculas.edit', $matricula->id)}}"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Matricula</button></a></li>
        @endcan
        <li class="breadcrumb active"><a href="{{ route('matriculas.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h5><strong>{{ $matricula->nombre  }}</strong> </h5>
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

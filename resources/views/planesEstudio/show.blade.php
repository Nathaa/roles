@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('planeEstudio.edit')
    <li class="breadcrumb-item active"><a href="{{ route('planesEstudio.edit', $planesEstudio->id)}}"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Plan de Estudio</button></a></li>
    @endcan
    <li class="breadcrumb active"><a href="{{ route('planesEstudio.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h5><strong>{{ $planesEstudio->nombre_plan  }}</strong> </h5>

@endsection


@section('content')



                            <div class="container">
                                <th scope="row"></th>


                                <div class="card">

                                   <div class="card-body">

                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                            <th>Datos De Plan de Estudios</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <td><p><strong>Nombre de plan: </strong> {{ $planesEstudio->nombre_plan }}</p></td>
                                            <td><p><strong>duracion: </strong> {{ $planesEstudio->duracion }}</p></td>

                                    </tr>

                                </tbody>
                            </table>
                            </div>
                </div>
            </div>





@endsection

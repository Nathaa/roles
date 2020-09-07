@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('planesEstudio.edit')
    <li class="breadcrumb-item active"><a href="{{ route('planesEstudio.edit', $planesEstudio->id)}}">Editar Plan de Estudio</a></li>
    @endcan
    @can('planesEstudio.index')
    <li class="breadcrumb-item active"><a href="{{ route('planesEstudio.index', $planesEstudio->cod_id)}}">Regresar atras</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h3>Datos de Plan de Estudios : {{ $planesEstudio->nombre_plan  }} </h3>
@endsection


@section('content')



                            <div class="container">
                                <th scope="row"></th>


                                <div class="card">

                                   <div class="card-boady">

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

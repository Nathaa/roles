@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('grados.edit')
    <li class="breadcrumb-item active"><a href="{{ route('grados.edit', $grado->id)}}">Editar Grado</a></li>
    @endcan
    @can('grados.index')
    <li class="breadcrumb-item active"><a href="{{ route('grados.index', $grado->cod_id)}}">Regresar atras</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h3>Datos de grado : {{ $grado->grado  }} {{$grado->seccion}}</h3>
@endsection


@section('content')



                            <div class="container">
                                <th scope="row"></th>


                                <div class="card">

                                   <div class="card-boady">

                                    <table class="table table-bordered table-hover">
                                        <thead class="bg-primary">
                                            <tr>
                                            <th>Datos De Grado</th>
                                            </tr>

                                           </thead>
                                    </table>
                                    <table class="table table-bordered table-hover">


                                <tbody>

                                    <tr>
                                        <td><p><strong>Grado: </strong> {{ $grado->grado }}</p></td>
                                            <td><p><strong>Seccion: </strong> {{ $grado->seccion }}</p></td>
                                                <td><p><strong>Categoria: </strong> {{ $grado->categoria }}</p></td>
                                    </tr>

                                </tbody>
                            </table>
                            </div>
                </div>
            </div>





@endsection

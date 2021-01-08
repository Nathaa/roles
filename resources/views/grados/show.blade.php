@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('grados.edit')
    <li class="breadcrumb-item active"><a href="{{ route('grados.edit', $grado->id)}}"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar grado</button></a></li>
    @endcan
    <li class="breadcrumb active"><a href="{{ route('grados.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h5><strong>{{ $grado->grado  }} {{$grado->seccion}} </strong> </h5>

@endsection


@section('content')



                            <div class="container">
                                <th scope="row"></th>


                                <div class="card">

                                   <div class="card-body">

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

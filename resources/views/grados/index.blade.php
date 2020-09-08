@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">

  </ol>
</div><!-- /.col -->
@endsection


@section('title')

@endsection


@section('content')
<div class="container">

    <h6>
   @if($search)
  <div class="alert alert-info" role="alert">
    Los resultados de tu busqueda {{ $search }} son
  </div>
  @endif
 </h6>
 <div class="container-fluid">
    <div class="card">
        <div class="card-header">

            @can('grados.create')
                 <a href="{{ route('grados.create') }}"> <button type="button" class="btn btn-dark btn-xs">
                <i class="fas fa-plus"></i>Crear Grado </button> </a>
            @endcan
        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('grados.index') }}"><i class="fa fa-align-justify"></i> Listado Grados</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Grado</th>
           <th scope="col">Seccion</th>
           <th colspan="3">&nbsp;Opciones</th>

         </tr>
       </thead>
       <tbody>
          @foreach ($grados as $grado)
           <tr>
            <td>{{$grado->grado}}</td>
            <td>{{$grado->seccion}}</td>
            <td width="10px">
                @can('grados.edit')

                <a href="{{ route('grados.edit', $grado->id) }}" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
                  @endcan
                </td>
                <td width="10px">
                @can('grados.show')

                <a href="{{ route('grados.show', $grado->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>

                @endcan
                </td>
                <td width="10px">
                @can('grados.destroy')
                {!! Form::open(['route' => ['grados.destroy', $grado->id],
  'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el expediente?")']) !!}
  <button class="btn btn-sm btn-danger">
      Eliminar
  </button>
{!! Form::close() !!}
                @endcan
                </td>

           </tr>

         @endforeach

       </tbody>
      </table>

</div>
</div>
</div>
</div>
@endsection

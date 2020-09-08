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
    Los resultados de tu búsqueda {{ $search }} son
  </div>
  @endif
 </h6>
 <div class="container-fluid">
    <div class="card">
        <div class="card-header">

            @can('matriculas.create')
                 <a href="{{ route('matriculas.create') }}"> <button type="button" class="btn btn-dark btn-xs">
                <i class="fas fa-plus"></i>Crear Nueva </button> </a>
            @endcan
        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('matriculas.index') }}"><i class="fa fa-align-justify"></i> Listado matriculas</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Nombre</th>
           <th scope="col">Descripción</th>
           <th colspan="3">&nbsp;Opciones</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($matriculas as $matricula)
           <tr>
            <td>{{$matricula->nombre}}</td>
            <td>{{$matricula->descripcion}}</td>
            <td width="10px">
                @can('matriculas.edit')

                <a href="{{ route('matriculas.edit', $matricula->id) }}" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
                  @endcan
                </td>
                <td width="10px">
                @can('matriculas.show')

                <a href="{{ route('matriculas.show', $matricula->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>

                @endcan
                </td>
                <td width="10px">
                @can('matriculas.destroy')
                {!! Form::open(['route' => ['matriculas.destroy', $matricula->id],
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

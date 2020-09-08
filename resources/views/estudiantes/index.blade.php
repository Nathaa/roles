@extends('admin.index2')

@section('crear')

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

            @can('estudiantes.create')
                 <a href="{{ route('estudiantes.create') }}"> <button type="button" class="btn btn-dark btn-xs">
                <i class="fas fa-plus"></i>Crear Expediente </button> </a>
            @endcan
        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('estudiantes.index') }}"><i class="fa fa-align-justify"></i> Listado estudiantes</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Nombre</th>
           <th scope="col">Apellidos</th>
           <th colspan="3">&nbsp;Opciones</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($estudiantes as $estudiante)
           <tr>
            <td>{{$estudiante->nombre}}</td>
            <td>{{$estudiante->apellido}}</td>
            <td width="10px">
                @can('estudiantes.edit')

                <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
                  @endcan
                </td>
                <td width="10px">
                @can('estudiantes.show')

                <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>

                @endcan
                </td>
                <td width="10px">
                @can('estudiantes.destroy')
                {!! Form::open(['route' => ['estudiantes.destroy', $estudiante->id],
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




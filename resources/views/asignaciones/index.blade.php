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

 </h6>

 @if(Session::has('success_message'))
 <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('success_message') }}
 </div>
 @endif

 @if(Session::has('info_message'))
 <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('info_message') }}
 </div>
 @endif

 @if(Session::has('danger_message'))
 <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('danger_message') }}
 </div>
 @endif

 <div class="container-fluid">
    <div class="card">
        <div class="card-header">

            <td width="10px">
                @can('asignaciones.create')
                <a href="{{ route('asignaciones.create') }}"> <button type="button" class="btn btn-dark btn-xs">
               <i class="fas fa-plus"></i>Crear Asignacion_academico </button> </a>
           @endcan
        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('asignaciones.index') }}"><i class="fa fa-align-justify"></i> Listado asignaciones</a>
                </div>


            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Grados</th>
           <th scope="col">Materias</th>
           <th scope="col">Periodos</th>

           <th colspan="3">&nbsp;Opcion</th>
         </tr>

       <tbody>

        @foreach ($asignaciones as $asignacion)
           <tr>
            <td>{{ $asignacion->grado}}</td>
            <td>{{ $asignacion->materias}}</td>
            <td>{{ $asignacion->periodos}}</td>


            <td width="10px">
                @can('asignaciones.edit')

                <a href="{{ route('asignaciones.edit', $asignacion->grado) }}" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
                  @endcan
                </td>
                <td width="10px">
                @can('asignaciones.show')

                <a href="{{ route('asignaciones.show', $asignacion->grado) }}" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>

                @endcan
                </td>
                <td width="10px">
                @can('asignaciones.destroy')
                {!! Form::open(['route' => ['asignaciones.destroy', $asignacion->grado],
  'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el grado?")']) !!}
  <button class="btn btn-danger" class="btn btn-info btn-flat" title="Eliminar">
    <i class="fas fa-trash" aria-hidden="true"></i>
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
</div>
@endsection

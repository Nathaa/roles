@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
  </ol>
  @if(Session::has('success_message'))
    <div id="msj_verde" class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ Session::get('success_message') }}
    </div>
  @endif

  @if(Session::has('info_message'))
    <div id="msj_azul" class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ Session::get('info_message') }}
    </div>
  @endif

  @if(Session::has('danger_message'))
    <div id="msj_rojo" class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ Session::get('danger_message') }}
    </div>
  @endif
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
        @can('docentes.create')
             <a href="{{ route('docentes.create') }}"> <button type="button" class="btn btn-dark btn-xs">
            <i class="fas fa-plus"></i>Crear Docente </button> </a>
        @endcan
      </div>
      <div class="card-body">
        <div class="form-group row">
          <div class="col-md-6">
              <a href="{{ route('docentes.index') }}"><i class="fa fa-align-justify"></i> Listado Docentes</a>
          </div>
        </div>
        <table class="table table-bordered thead-dark table-hover table-sm">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">DUI</th>
            <th colspan="3">&nbsp;Opciones</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($docentes as $docente)
             <tr>
              <td>{{$docente->nombre}}</td>
              <td>{{$docente->apellido}}</td>
               <td>{{$docente->dui}}</td>
              <td width="10px">
                  @can('docentes.edit')

                  <a href="{{ route('docentes.edit', $docente->id) }}" class="btn btn-default btn-flat" title="Editar">
                      <i class="fa fa-wrench" aria-hidden="true"></i>
                    </a>
                    @endcan
                  </td>
                  <td width="10px">
                  @can('docentes.show')

                  <a href="{{ route('docentes.show', $docente->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                      <i class="fas fa-eye" aria-hidden="true"></i>
                    </a>

                  @endcan
                  </td>
                  <td width="10px">
                  @can('docentes.destroy')
                  {!! Form::open(['route' => ['docentes.destroy', $docente->id],
    'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el Docente?")']) !!}
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
        <br>
            <div class="row">
              <div class="mr-auto">
                {{$docentes->links()}}
              </div>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection




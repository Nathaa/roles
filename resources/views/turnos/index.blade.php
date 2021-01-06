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
    Los resultados de tu busqueda {{ $search }}
  </div>
  @endif
 </h6>
 
 <div class="container-fluid">
    <div class="card">
        <div class="card-header">

            @can('turnos.create')
                 <a href="{{ route('turnos.create') }}"> <button type="button" class="btn btn-dark btn-xs">
                <i class="fas fa-plus"></i>Crear Turno </button> </a>
            @endcan
        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('turnos.index') }}"><i class="fa fa-align-justify"></i> Listado Turnos</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>
           <th scope="col">Nombre del Turno</th>
           <th scope="col">Hora de entrada</th>
           <th scope="col">Hora de salida</th>
           <th colspan="3">&nbsp;Opciones</th>
         </tr>
       </thead>
       <tbody>
        @foreach ($turnos as $turno)
        <tr>
            <td>{{$turno->nombre_turno}}</td>
            <td>{{ Carbon\Carbon::parse($turno->hora_entrada)->isoFormat('H:mm A') }}</td>
            <td>{{ Carbon\Carbon::parse($turno->hora_salida)->isoFormat('H:mm A') }}</td>
            <td width="10px">
                @can('turnos.edit')

                <a href="{{ route('turnos.edit', $turno->id) }}" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
                  @endcan
                </td>
                <td width="10px">
                @can('turnos.show')

                <a href="{{ route('turnos.show', $turno->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>

                @endcan
                </td>
                <td width="10px">
                @can('turnos.destroy')
                {!! Form::open(['route' => ['turnos.destroy', $turno->id],
  'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el turno?")']) !!}
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
                {{$turnos->links()}}
              </div>
            </div>
</div>
</div>
 </div>
</div>
@endsection

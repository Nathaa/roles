@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('periodos.create')
    <li class="breadcrumb-item"><a href="{{ route('turnos.create') }}">Agregar Nuevo Turno</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection


@section('title')
<h3>Lista de Turnos</h3>
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
 <div class="card">
 <div class="card-boady">
 <table class="table table-bordered table-hover">
         <tr>
           <th scope="col">Nombre del Turno</th>
           <th scope="col">Hora de entrada</th>
           <th scope="col">Hora de salida</th>
         </tr>
       </thead>
       <tbody>
        @foreach ($turnos as $turno)
        <tr>
         @can('periodos.show')
          <td><a href="{{ route('turnos.show', $turno->id)}}">{{$turno->nombre_turno}}</td></a>
          <td>{{ Carbon\Carbon::parse($turno->hora_entrada)->isoFormat('H:mm A') }}</td>
          <td>{{ Carbon\Carbon::parse($turno->hora_salida)->isoFormat('H:mm A') }}</td>
         @endcan
          <td>
             @can('turnos.destroy')
           {!! Form::open(['route' => ['turnos.destroy', $turno->id],
           'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el turno?")']) !!}
           <button class="btn btn-sm btn-danger">
               Eliminar
           </button>
         {!! Form::close() !!}
            @endcan
          </td>
      @endforeach
       </tbody>
    </table>

</div>
</div>
</div>
@endsection

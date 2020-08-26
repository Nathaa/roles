@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('periodos.create')
    <li class="breadcrumb-item"><a href="{{ route('periodos.create') }}">Agregar Nuevo Periodo</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection


@section('title')
<h3>Lista de Periodos</h3>
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
 <div class="card">
 <div class="card-boady">
 <table class="table table-bordered table-hover">
         <tr>

           <th scope="col">Nombre</th>
           <th scope="col">Fecha de Inicio</th>
           <th scope="col">Fecha de Finalizacion</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($periodos as $periodo)
           <tr>
            @can('periodos.show')
             <td><a href="{{ route('periodos.show', $periodo->id)}}">{{$periodo->nombre}}</td></a>
             <td>{{$periodo->fecha_inicio}}</td>
             <td>{{$periodo->fecha_fin}}</td>
            @endcan
             <td>
                @can('periodos.destroy')
              {!! Form::open(['route' => ['periodos.destroy', $periodo->id],
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
@endsection

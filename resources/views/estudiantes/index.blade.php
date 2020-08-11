@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('estudiantes.create')
    <li class="breadcrumb-item"><a href="{{ route('estudiantes.create') }}">Crear Expediente</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection


@section('title')
<h3>Lista de Expedientes</h3>
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
           <th scope="col">Apellidos</th>
           <th scope="col">Opciones</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($estudiantes as $estudiante)
           <tr>
            @can('estudiantes.show')
             <td><a href="{{ route('estudiantes.show', $estudiante->id)}}">{{$estudiante->nombre}}</td></a>
             <td>{{$estudiante->apellido}}</td>
            @endcan
             <td>
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
@endsection

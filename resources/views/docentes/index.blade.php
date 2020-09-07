@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('docentes.create')
    <li class="breadcrumb-item"><a href="{{ route('docentes.create') }}">Crear Docente</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection


@section('title')
<h3>Lista de Docentes!!</h3>
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
           <th scope="col">DUI</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($docentes as $docente)
           <tr>
            @can('docentes.show')
             <td><a href="{{ route('docentes.show', $docente->id)}}">{{$docente->nombre}}</td></a>
             <td>{{$docente->apellido}}</td>
             <td>{{$docente->dui}}</td>

            @endcan
             <td>
                @can('docentes.destroy')
              {!! Form::open(['route' => ['docentes.destroy', $docente->id],
              'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el docente?")']) !!}
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




@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('anios.create')
    <li class="breadcrumb-item"><a href="{{ route('anios.create') }}">Agregar Nuevo Año</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection


@section('title')
<h3>Lista de Años</h3>
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

           <th scope="col">Año lectivo</th>
           <th scope="col">Duracion en semanas</th>
           
         </tr>
       </thead>
       <tbody>
          @foreach ($anios as $anio)
           <tr>
            @can('anios.show')
             <td><a href="{{ route('anios.show', $anio->id)}}">{{$anio->nombre}}</td></a>
             <td>{{$anio->duracion}}</td>
             
            @endcan
             <td>
                @can('anios.destroy')
              {!! Form::open(['route' => ['anios.destroy', $anio->id],
              'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el Año?")']) !!}
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
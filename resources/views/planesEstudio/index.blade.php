@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('planesEstudio.create')
    <li class="breadcrumb-item"><a href="{{ route('planesEstudio.create') }}">Agregar Plan de Estudio</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection


@section('title')
<h3>Lista de planes de estudio</h3>
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

           <th scope="col">Plan</th>
           <th scope="col">Duracion</th>
           <th scope="col">Opciones</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($planesEstudio as $planEstudio)
           <tr>
            @can('planesEstudio.show')
             <td><a href="{{ route('planesEstudio.show', $planEstudio->id)}}">{{$planEstudio->nombre_plan}}</td></a>
             <td>{{$planEstudio->duracion}}</td>
            @endcan
             <td>
                @can('planesEstudio.destroy')
              {!! Form::open(['route' => ['planesEstudio.destroy', $planEstudio->id],
              'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el registro de plan de estudio?")']) !!}
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

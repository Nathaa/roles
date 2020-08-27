@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('matriculas.create')
    <li class="breadcrumb-item"><a href="{{ route('matriculas.create') }}">Agregar Nueva Matrícula</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection


@section('title')
<h3>Lista de Matrículas</h3>
@endsection


@section('content')
<div class="container">

  <h6>
   @if($search)
  <div class="alert alert-info" role="alert">
    Los resultados de tu búsqueda {{ $search }} son
  </div>
  @endif
 </h6>
 <div class="card">
 <div class="card-boady">
 <table class="table table-bordered table-hover">
         <tr>

           <th scope="col">Nombre</th>
           <th scope="col">Descripción</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($matriculas as $matricula)
           <tr>
            @can('matriculas.show')
             <td><a href="{{ route('matriculas.show', $matricula->id)}}">{{$matricula->nombre}}</td></a>
             <td>{{$matricula->descripcion}}</td>
            @endcan
              <td width="10">
                @can('matriculas.show')
                <a href="{{ route('matriculas.show', $matricula->id) }}" class="btn btn-sm btn-default">Ver</a>
                @endcan
              </td>
              <td width="10">
                  @can('matriculas.edit')
                    <a href="{{ route('matriculas.edit', $matricula->id) }}" class="btn btn-sm btn-default">Editar</a>
                  @endcan
              </td> 
             <td>
              @can('matriculas.destroy')
              {!! Form::open(['route' => ['matriculas.destroy', $matricula->id],
              'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar la matrícula?")']) !!}
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
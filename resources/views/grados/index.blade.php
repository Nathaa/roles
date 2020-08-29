@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('grados.create')
    <li class="breadcrumb-item"><a href="{{ route('grados.create') }}">Agregar grado</a></li>
    @endcan
  </ol>
</div><!-- /.col -->
@endsection


@section('title')
<h3>Lista de Grados</h3>
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

           <th scope="col">Grado</th>
           <th scope="col">Seccion</th>
           <th scope="col">Categoria</th>
           <th scope="col">Opciones</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($grados as $grado)
           <tr>
            @can('grados.show')
             <td><a href="{{ route('grados.show', $grado->id)}}">{{$grado->grado}}</td></a>
             <td>{{$grado->seccion}}</td><td>{{$grado->categoria}}</td>
            @endcan
             <td>
                @can('grados.destroy')
              {!! Form::open(['route' => ['grados.destroy', $grado->id],
              'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el registro de grado?")']) !!}
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

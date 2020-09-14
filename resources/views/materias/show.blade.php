@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
        @can('materias.edit')
        <li class="breadcrumb-item active"><a href="{{ route('materias.edit', $materia->id)}}"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar Materia</button></a></li>
        @endcan
        <li class="breadcrumb active"><a href="{{ route('materias.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

    </ol>
</div>
@endsection
@section('title')
<h5><strong>{{ $materia->nombre  }}</strong> </h5>
@endsection

@section('content')

<div class="container">
    <div class="card">

       <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="bg-primary">
                <tr>
                <th>Datos de la Materia</th>
                </tr>

               </thead>
        </table>
    <table class="table table-bordered table-hover">


        <tbody>


              <tr>
                 <th scope="row"><strong>Nombre:</strong></th>
                 <td> <p> {{$materia->nombre}}</p></td>
             </tr>
              <tr>
                  <th scope="row"><strong>Descripcion: </strong></th>
                  <td><p> {{ $materia->descripcion }}</p></td>
              </tr>

              <tr>
                   <th scope="row"><strong>Estado:</strong></th>
                   <td>
                    @if ($materia->estado == '1')
                    <span class="badge badge-success">Activo</span>
                    @else
                    <span class="badge badge-danger">Desactivado</span>
                    @endif
            </td>

             </tr>



       </tbody>
   </table>

</div>
</div>
</div>


@endsection

@extends('admin.index2')


@section('content')


<div class="container text-center" style="background-color: LightSteelBlue;">
    <i class="fas fa-book-open" style='font-size:36px;color: #778899'></i>
        <h4>Listado de Materias</h4>
</div>
<h6>
    @if($search)
      <div class="alert alert-info" role="alert">
        Resultados de la busqueda {{ $search }} 
      </div>
      @endif
</h6>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                    <a href="{{ route('materias.index') }}"><i class="fa fa-align-justify"></i> Materias</a>
                @can('materias.create')
                     <a href="{{ route('materias.create') }}"> <button type="button" class="btn btn-dark">
                    <i class="fas fa-plus"></i> Nuevo </button> </a>
                @endcan
            </div>


            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        
                    </div>
                </div>
                <table class="table table-bordered thead-dark table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nombre de la Materia</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($materias as $materia)
                    <tr>
                        <td>{{ $materia->nombre  }}</td>
                        <td>{{ $materia->descripcion  }}</td>
                            <td>
                                    @if ($materia->estado == '1')
                                    <span class="badge badge-success">Activo</span>
                                    @else
                                    <span class="badge badge-danger">Desactivado</span>
                                    @endif                                   
                            </td>
                            <td>
                            @can('materias.edit')

                            <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-default btn-flat" title="Editar">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                              </a>
                              @endcan
                            @can('materias.show')

                            <a href="{{ route('materias.show', $materia->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                                <i class="fas fa-eye" aria-hidden="true"></i>
                              </a>
                            
                            @endcan

                            @can('materias.destroy')
                            <a href="{{ route('materias.destroy', $materia->id) }}" data-target="#modal-delete-{{ $materia->id }}" data-toggle="modal" class="btn btn-danger btn-flat" title="Eliminar">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                            @endcan
                            </td>
                        </tr> 

                        @include('materias.modal')
                        @endforeach  
                       
                        
                        
                    </tbody>
                </table>
                
            </div>
            {{ $materias->links() }}
        </div>
        
    </div>


@endsection
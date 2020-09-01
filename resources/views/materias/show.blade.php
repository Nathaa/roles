@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
        @can('materias.edit')
        <li class="breadcrumb-item active"><a href="{{ route('materias.edit', $materia->id)}}"><button type="button" class="btn btn-secondary  btn-sm"><i class="fas fa-edit"></i>Editar Expediente</button></a></li>
        @endcan
        @can('materias.index')
        <li class="breadcrumb-item active"><a href="{{ route('materias.index', $materia->id)}}" ><button type="button" class="btn btn-success  btn-sm"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
        @endcan
    </ol>
</div>
@endsection
@section('title')
<h3><strong>Materia  : </strong>{{ $materia->nombre  }} </h3>
@endsection

@section('content')
<div class="card">

     <table class="table table-bordered table-hover">
         <thead class="bg-info sm" align="center">
             <tr>
             <th>Datos de la Materia</th>
             </tr>
            </thead>
    <table class="table table-bordered table-hover">
        <tbody>
                <div class="row register-form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
            
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-chalkboard-teacher text-info"></i></div>
                                </div>
                                <input class="form-control" type="text" value="{{ $materia->nombre }}" disabled="true">
                            </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
            
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-file-alt text-info"></i></div>
            
                            </div>
                            <input class="form-control" type="text" value="{{ $materia->descripcion }}" disabled="true">
                        </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
            
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-check text-info"></i></div>
            
                        </div>
                        <input class="form-control" type="text" value="{{ $materia->estado }}" disabled="true">
                    </div>
              </div>
                </div>
            </div>
        </tbody>
     </table>
</div>
@endsection
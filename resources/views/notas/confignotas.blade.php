@extends('admin.index2')

@section('title')

@endsection
@section('content')
<div class="container">
<div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <div class="card-body">
            <h3>Configurar y digitar las notas de las materias que imparte</h3>
            <div class="form-group row">
              <div class="col-md-6">
                  <a href="{{ route('notas.confignotas') }}"><i class="fa fa-align-justify"></i> Listado Materias en curso</a>
              </div>
            </div>

    <table class="table table-bordered table-hover table-sm">
    <thead>
        <tr class="thead-dark">
          <th scope="col">Materia</th>
          <th scope="col">Grado</th>
          <th scope="col">Asignar # de notas</th>
          <th scope="col">Digitar Notas Estudiantes</th>
          <th scope="col">Ver Promedios</th>
          <th scope="col">Ver Notas Por Periodos</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($materias as $materia)
           <tr>
            <td width="20%">{{$materia->nombre}}</td>

                <td width="25%">
                    {{$materia->grado}}
                    {{ $materia->seccion}}
                    {{ $materia->categoria}}
                </td>
                <td width="10%">
                    @can('notas.editarnotas')

                    <a href="{{ route('notas.editarnotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre]) }}" class="btn btn-default btn-flat" title="Editar">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                      </a>
                      @endcan
                </td>
                <td width="15%">
                    @can('notas.ingresoNotas')
                    <a href="{{ route('notas.ingresoNotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre]) }}" class="btn btn-success btn-flat" title="IngresarNotas">
                        <i class="far fa-address-book" aria-hidden="true"></i>
                      </a>
                      @endcan
                </td>


                <td width="10%">
                    @can('notas.verPromedios')
                    <a href="{{ route('notas.verPromedios', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre, 'idgrado'=>$materia->id, 'categoria'=>$materia->categoria]) }}" class="btn btn-info btn-flat" title="ver">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                      @endcan
                    </td>
                    <td width="20%">
                        @can('notas.verNotas')
                        <a class="btn btn-info mt-1" href="{{ route('notas.verNotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre, 'idgrado'=>$materia->id, 'categoria'=>$materia->categoria , 'periodo'=>'1']) }}" class="btn btn-default btn-flat" title="ver">
                            Periodo 1
                          </a>
                          @endcan
                          @can('notas.verNotas')
                        <a class="btn btn-info mt-1" width="10%" href="{{ route('notas.verNotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre, 'idgrado'=>$materia->id, 'categoria'=>$materia->categoria , 'periodo'=>'2']) }}" class="btn btn-default btn-flat" title="ver">
                            Periodo 2
                          </a>
                          @endcan
                          @can('notas.verNotas')
                        <a class="btn btn-info mt-1" href="{{ route('notas.verNotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre, 'idgrado'=>$materia->id, 'categoria'=>$materia->categoria , 'periodo'=>'3']) }}" class="btn btn-default btn-flat" title="ver">
                            Periodo 3
                          </a>
                          @endcan
                          @can('notas.verNotas')
                        <a class="btn btn-info mt-1" href="{{ route('notas.verNotas', ['grado'=>$materia->grado, 'seccion'=> $materia->seccion, 'nombre'=> $materia->nombre, 'idgrado'=>$materia->id, 'categoria'=>$materia->categoria , 'periodo'=>'4']) }}" class="btn btn-default btn-flat" title="ver">
                            Periodo 4
                          </a>
                          @endcan
                        </td>
           </tr>

         @endforeach
        </tbody>
      </table>

      </div>
    </div>
</div>
</div>
</div>
@endsection

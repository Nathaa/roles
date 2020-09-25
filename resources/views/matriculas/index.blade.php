@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
  </ol>
</div><!-- /.col -->
@endsection


@section('title')

@endsection


@section('content')
<div class="container">

  <h6>
  {{--  @if($search)
  <div class="alert alert-info" role="alert">
    Los resultados de tu búsqueda {{ $search }} son
  </div>
  @endif --}}
 </h6>
 <div class="container-fluid">
    <div class="card">
        <div class="card-header">

            @can('matriculas.create')
                <a href="{{ route('matriculas.tipoMatricula') }}"> <button type="button" class="btn btn-dark btn-xs">
                <i class="fas fa-plus"></i>Crear Matricula </button> </a>
                {{-- <a href="{{ route('matriculas.dataTable') }}"> <button type="button" class="btn btn-dark btn-xs">
                <i class="fas fa-plus"></i>Crear Matricula </button> </a> --}}
            @endcan
        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('matriculas.index') }}"><i class="fa fa-align-justify"></i> Listado Matriculas</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Nombre</th>
           <th scope="col">Apellido</th>
           <th scope="col">Grado</th>
           <th scope="col">Seccion</th>
           <th scope="col">Turno</th>
           <th scope="col">Año</th>
           <th colspan="3">&nbsp;Opciones</th>
         </tr>
       </thead>
       <tbody>
          @foreach ($matriculas as $matricula)
           <tr>
            <td>{{$matricula->nombre}}</td>
            <td>{{$matricula->apellido}}</td>
            <td>{{$matricula->grado}}</td>
            <td>{{$matricula->seccion}}</td>
            <td>{{$matricula->nombre_turno}}</td>
            <td>{{$matricula->año}}</td>
            <td width="10px">
                @can('matriculas.edit')

                <a href="{{ route('matriculas.edit', $matricula->id) }}" class="btn btn-default btn-flat" title="Editar">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                  </a>
                  @endcan
                </td>
                <td width="10px">
                @can('matriculas.show')

                <a href="{{ route('matriculas.show', $matricula->id) }}" class="btn btn-info btn-flat" title="Visualizar">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                  </a>

                @endcan
                </td>
                <td width="10px">
                @can('matriculas.destroy')
                {!! Form::open(['route' => ['matriculas.destroy', $matricula->id],
  'method' =>'DELETE','onsubmit' => 'return confirm("¿Desea eliminar el expediente?")']) !!}
  <button class="btn btn-danger" class="btn btn-info btn-flat" title="Eliminar">
    <i class="fas fa-trash" aria-hidden="true"></i>
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
</div>
@endsection

{{-- @section('scripts')

<script>
   $(document).ready(function(){
        /* $(function DatosGrado(){
            var idGrado={!! json_encode($matricula->grados_id) !!};//recibo el id del grado
            $.get('/grado/'+idGrado,function (datos1){

                for(var i=0;i<datos1.length;i++){
                    if(datos1[i].turnos_id=="1"){datos1[i].turnos_id="Matutino";};
                    if(datos1[i].turnos_id=="2"){datos1[i].turnos_id="Vespertino";};
                    if(datos1[i].turnos_id=="3"){datos1[i].turnos_id="Completo";};
                }
                //for(var i=0;i<datos1.length;i++)


                //$('#turnos').html(plantilla_turnos);
            });
        }); */
    });
</script>
@stop
 --}}

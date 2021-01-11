@extends('admin.index2')


@section('title')
<h5><strong></strong> </h5>
@endsection

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="{{ route('asignaciones.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div>
@endsection
@section('content')
<div class="container">
    <div class="card">

       <div class="card-body">
        <table class="table table-bordered table-hover">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif




                    <div id="msj_azul_fijo" class="alert alert-primary" role="alert">
                        Asignacion Academica
                </div>

<form action="{{ url('/asignacion/'.$x) }}"  method="POST" role="form">

        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">


    <div class="row">
        <div class="col">
                            <select name="grados_id" id="grados_id" class="form-control" >
                                <option value="">Seleccione Grado</option>
                                @foreach($grados as $grado)


                                           <option value="{{ $grado->id }}",null @foreach ($grad as $g) <?php  if($g->grados_id == $grado->id) { ?> selected  <?php } ?> @endforeach>
                                              {{ $grado->grado }}{{ $grado->seccion }}

                                            </option>

                                          @endforeach
                                        </td>
                                </select>

        </div>


    </div>
<br>
<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
    Periodos
</div>
<div class="col">
    <div class="form-group">
        <ul class="list-unstyled">

        <div>
         @foreach($periodos as $periodo)

<label>{{$periodo->nombre_periodo}}</label>
<input type="checkbox" id="periodo[]" name="periodo[]" value="{{ $periodo->id }}" @foreach ($asignaciones as $asignacion) <?php  if($asignacion->periodos_id == $periodo->id) { ?> checked <?php } ?> @endforeach>

    @endforeach
  </ul>
 </div>
</div>
<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
    Materias
</div>



         @foreach($materias as $materia)
         <div class="checkbox col-sm-6">

 <input type="checkbox" id="materia[]" name="materia[]" value="{{ $materia->id }}" @foreach ($asignaciones2 as $asignacion2) <?php  if($asignacion2->materias_id == $materia->id) { ?> checked <?php } ?> @endforeach>
 <label>{{$materia->nombre}}</label>
</div>
 @endforeach
</ul>
 </div>












 <br>
 <ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success']) }}
</ol>


</form>




                </table>

        </div>

    </div>
</div>

@endsection

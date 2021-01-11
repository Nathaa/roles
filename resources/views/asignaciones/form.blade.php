{!! csrf_field() !!}


<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
    Asignacion Academica
</div>

<form>



    <div class="row">
        <div class="col">
                            <select name="grados_id" id="grados_id" class="form-control" >
                                <option value="">Seleccione Grado</option>
                                @foreach($grados as $grado)


                                           <option value="{{ $grado->id }}",null>
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

         @foreach($periodos as $periodo)
<label>{{$periodo->nombre_periodo}}</label>
<input type="checkbox" id="periodo[]" name="periodo[]" value="{{ $periodo->id }}">

    @endforeach
  </ul>
 </div>
</div>



<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
    Materias
</div>

         @foreach($materias as $materia)
         <div class="checkbox col-sm-6">

 <input type="checkbox" id="materia[]" name="materia[]" value="{{ $materia->id }}">
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


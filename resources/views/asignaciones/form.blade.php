{!! csrf_field() !!}


<div class="alert alert-primary" role="alert">
        Datos del Año
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

        <div class="col">
            <div class="form-group">
                <ul class="list-unstyled">
                {{  Form::label('periodos_id','Periodos') }}
                <div>
                 @foreach($periodos as $periodo)
        <label>{{$periodo->nombre}}</label>
        <input type="checkbox" id="periodo[]" name="periodo[]" value="{{ $periodo->id }}">
       
            @endforeach
          </ul>
         </div>
        </div>
    </div>
<br>
<br>
    <div class="form-group">


        {{  Form::label('materias_id','Materias') }}
        <div>

         @foreach($materias as $materia)
 <label>{{$materia->nombre}}</label>
 <input type="checkbox" id="materia[]" name="materia[]" value="{{ $materia->id }}">
    @endforeach
</ul>
 </div>

</div>










 <br>
 <ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success']) }}
</ol>


</form>


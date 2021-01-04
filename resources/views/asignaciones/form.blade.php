

{!! csrf_field() !!}


<div class="alert alert-primary" role="alert">
Nueva Planificacion Academica
</div>

<form>



    <div class="row">
        <div class="col">


            <option value="">Seleccione Grado</option>
            <hr>

                                <select name="grados_id" size=6 id="grados_id" class="form-control" >

                                    @foreach($grados as $grado)


                                    <option value="{{ $grado->id }}",null>
                                       {{ $grado->grado }}{{ $grado->seccion }}

                                     </option>

                                   @endforeach
                                 </select>

        </div>

        <div class="col">
            <div class="form-group">
                <ul class="list-unstyled">
                {{  Form::label('periodos_id','Periodos') }}
                <hr>
                <div>
                    <ul class="list-unstyled">
                 @foreach($periodos as $periodo)
        {{$periodo->nombre_periodo}}
        <input type="checkbox" id="periodo[]" name="periodo[]" value="{{ $periodo->id }}">

            @endforeach
          </ul>
         </div>
        </div>
    </div>
<br>

<hr>

    <div class="form-group">
        <br>
        <ul class="list-unstyled">
        {{  Form::label('materias_id','Materias') }}
        <hr>

        <div>

         @foreach($materias as $materia)
 {{$materia->nombre}}
 <input type="checkbox" id="materia[]" name="materia[]" value="{{ $materia->id }}">
    @endforeach

 </div>
</ul>
</div>










 <br>
 <ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success']) }}
</ol>


</form>

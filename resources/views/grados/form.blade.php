{!! csrf_field() !!}


<hr>

<div class="alert alert-primary" role="alert">
        Datos de grado
      </div>

<form>


        <div class="row">
           <div class="col">
             {{ Form::label('grado', 'Grado')}}
              {{ Form::text('grado',null,['class' => 'form-control']) }}

             </div>
               <div class="col">
                {{ Form::label('seccion', 'Seccion')}}
                {{ Form::text('seccion',null,['class' => 'form-control']) }}
                </div>
                <div class="col">
                    {{ Form::label('capacidad', 'Capacidad')}}
                    {{ Form::text('capacidad',null,['class' => 'form-control']) }}
                    </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('anios_id', 'Seleccione el Año') !!}
                        <div class="form-group">
                            <select name="anios_id" id= "anios_id" class="form-control" required>
                                <option value="">--Año--</option>
                                @foreach ($anios as $anio)
                                <option value="{{ $anio->id }}"> {{ $anio->año}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   </div>



        </div>

        <div class="col">


<br>
        </br>
            <div class="row">
               <div class="col">
                <div class="form-group">
                    {!! Form::label('plan_estudios_id', 'Seleccione el Plan de Estudio') !!}
                    <div class="form-group">
                        <select name="plan_estudios_id" id= "plan_estudios_id" class="form-control" required>
                            <option value="">--Plan de Estudio--</option>
                            @foreach ($planesEstudio as $planEstudio)
                            <option value="{{ $planEstudio->id }}"> {{ $planEstudio->nombre_plan}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
               </div>
                <br>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('docentes_id', 'Seleccione el Docente') !!}
                        <div class="form-group">
                            <select name="docentes_id" id= "docentes_id" class="form-control" required>
                                <option value="">--Docentes--</option>
                                @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}"> {{ $docente->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('turnos_id', 'Seleccione el Turno') !!}
                        <div class="form-group">
                            <select name="turnos_id" id= "turnos_id" class="form-control" required>
                                <option value="">--Turnos--</option>
                                @foreach ($turnos as $turno)
                                <option value="{{ $turno->id }}"> {{ $turno->nombre_turno}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col">
                    {{ Form::label('categoria', 'Categoria')}}

                    <br>

    <input type="radio" name="categoria" id="categoria" value="Tercer Ciclo">Tercer Ciclo<br>
    <input type="radio" name="categoria" id="categoria" value="Bachillerato General">Bachillerato General<br>
    <input type="radio" name="categoria" id="categoria" value="Bachillerato Vocacional">Bachillerato Vocacional<br>

                  </div>

            </div>
<br>
<br>
<br>
<br>
<br>
<ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success']) }}
</ol>



</form>




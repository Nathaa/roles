{!! csrf_field() !!}


     <div class="alert alert-primary" role="alert">
        Datos de la Materia
    </div>


<form>

       <div class="row">
          <div class="col">
            {{ Form::label('nombre', 'Nombre')}}
            {{ Form::text('nombre',null,['class' => 'form-control']) }}
          </div>
          <div class="col">
            {{ Form::label('descripcion', 'Apellidos')}}
            {{ Form::text('descripcion',null,['class' => 'form-control']) }}
          </div>

        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="estado"> Estado  </label>
                    <select name="estado" class="form-control" style="width: 500px" required="required">
                        <option value="" disabled selected>Elige el Estado de la Materia</option>
                        <option value="1">1 - Activo (La materia esta siendo Impartida) </option>
                        <option value="0">0 - Inactivo (La materia ya no se imparte) </option>
                    </select>
                </div>
            </div>
        </div>
    <br>



        <ol class="float-sm-right">
            <br>{{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success']) }}
        </ol>

</form>







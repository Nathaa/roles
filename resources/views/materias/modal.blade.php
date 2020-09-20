{!! csrf_field() !!}


     <div class="alert alert-primary" role="alert">
        Datos de la Materia
    </div>


<form id="formulario">

       <div class="row">
          <div class="col">
            {{ Form::label('nombre', 'Nombre')}}
            {{ Form::text('nombre',null,['class' => 'form-control', 'id' => 'nombre', 'onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)"]) }}
            <div class="invalid-feedback" style="display:none">
                El nombre de la materia no debe comenzar con números ni caracteres especiales
              </div> 
          </div>
          <div class="col">
            {{ Form::label('descripcion', 'Descripcion')}}
            {{ Form::text('descripcion',null,['class' => 'form-control', 'id'=>'descripcion','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)"]) }}
            <div class="invalid-feedback" style="display:none">
                El nombre de la descripcion no debe comenzar con números ni caracteres especiales
              </div> 
          </div>

        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-8">
                <div class="form-group">
                    <label for="estado"> Estado  </label>
                    <select name="estado" id="estado" class="form-control" style="width: 500px",  onkeyup="validar_select(this)", onblur="validar_select(this)" required autofocus>
                        <option value="" disabled selected>Elige el Estado de la Materia</option>
                        <option value="1">1 - Activo (La materia esta siendo Impartida) </option>
                        <option value="0">0 - Inactivo (La materia ya no se imparte) </option>
                    </select>
                    <div class="invalid-feedback" style="display:none">
                       El estado no debe quedar vacío
                    </div>
                </div>
            </div>
        </div>
    <br>



        <ol class="float-sm-right">
            <br>{{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit', 'disabled']) }}
        </ol>

</form>

@section('scripts')
<script src="{{ asset('js/validar-form-materias.js') }}"></script>
@stop





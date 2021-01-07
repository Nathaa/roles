{!! csrf_field() !!}

      <div class="row">
          <div class="col">
             <label>Imagen</label>
             <input type="file" name="imagen" class="form-control-file" class="text-center">
          </div>
     </div>
<hr>

     <div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos del Usuario
    </div>


<form>

       <div class="row">
          <div class="col">
            {{ Form::label('name', 'Nombre')}}
            {{ Form::text('name',null,['class' => 'form-control']) }}
          </div>
          <div class="col">
            {{ Form::label('apellidos', 'Apellidos')}}
            {{ Form::text('apellidos',null,['class' => 'form-control']) }}
          </div>

        </div>

        <div class="row">
            <div class="col">
               {{ Form::label('email', 'E mail')}}
               {{ Form::text('email',null,['class' => 'form-control']) }}
            </div>
            <div class="col">
                {{ Form::label('password', 'Contraseña')}}
               {{ Form::text('password',null,['class' => 'form-control', 'id'=>'password', 'onkeyup' => "validar_contrasenia(this)", 'onblur' => "validar_contrasenia(this)"]) }}
               <div class="invalid-feedback" style="display:none">
                La contraseña debe contener al menos minuscula, una mayuscula y un número, NO puede tener otros simbolos  con una longitud de 8 a 16 caracteres.
              </div>
            </div>
        </div>
    <br>

        <h4>Lista de Roles</h4>
<div class="form-group">
  <ul class="list-unstyled">
     @foreach($roles as $role)
     <li>
         <label>
        {{ Form::checkbox('roles[]', $role->id, null) }}
        {{ $role->name }}
        <em>({{ $role->description ?:'Sin descripcion' }})</em>
         </label>
     </li>

     @endforeach
  </ul>
</div>

        <ol class="float-sm-right">
            <br>{{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit']) }}
        </ol>

</form>
@section('scripts')

@endsection





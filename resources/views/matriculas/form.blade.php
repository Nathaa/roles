{!! csrf_field() !!}


<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos de la Matrícula
</div>

<form  id="formulario" >

    <div class="row">
       	{{ Form::label('nombre', 'Nombre')}}
        {{ Form::text('nombre',null,['class' => 'form-control', 'id'=> 'nombre', 'onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Agregar un nombre alusivo a un matricula', 'required' => 'required','autofocus'=>'autofocus']) }}
        <div class="invalid-feedback" style="display:none">
            El nombre no debe comenzar con números ni caracteres especiales
          </div>
    </div>

    <div class="row">
        {{ Form::label('descripcion', 'Descripción')}}
        {{ Form::text('descripcion',null,['class' => 'form-control', 'id' => 'descripcion','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Debe colocar una descripción de la matricula', 'required' => 'required','autofocus'=>'autofocus']) }}
        <div class="invalid-feedback" style="display:none">
            El nombre no debe comenzar con números ni caracteres especiales
          </div>
     </div>
 <br>
 <ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit', 'disabled']) }}
</ol>


</form>

@section('scripts')
<script src="{{ asset('js/validar-form-matriculas.js') }}"></script>
@endsection
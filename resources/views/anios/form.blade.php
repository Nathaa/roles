{!! csrf_field() !!}


<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos del Año
</div>

<form id="formulario">

    <div class="row">
       <div class="col">
         {{ Form::label('nombre', 'año lectivo')}}
         {{ Form::text('nombre',null,['class' => 'form-control', 'id'=> 'nombre','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Escribir el nombre del año']) }}
         <div class="invalid-feedback" style="display:none">
          El campo año lectivo, debe agregarsele un nombre.
        </div>
       </div>
       <div class="col">
         {{ Form::label('duracion', 'Duracion (Semanas)')}}
         {{ Form::text('duracion',null,['class' => 'form-control', 'id'=>'duracion','onblur' => "validar_numero(this)", 'onkeyup' => "validar_numero(this)", 'placeholder' => 'Debe colocar la cantidad de semanas']) }}
         <div class="invalid-feedback" style="display:none">
          El numero debe estar entre 0 o 100
        </div>
       </div>

     </div>
     <div class="row">
        {{ Form::label('año', 'Año')}}
        {{ Form::text('año',null,['class' => 'form-control','id'=> 'año','onkeyup' => "validar_cantidad(this)", 'onblur' => "validar_cantidad(this)", 'placeholder' => 'Por ejemplo 2005', 'required' => 'required','autofocus'=>'autofocus']) }}
        <div class="invalid-feedback" style="display:none">
          El campo años debe tener un nombre de 4 digitos, por ejemplo 2015
        </div>
      </div>

 <br>
 <ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit', 'disabled']) }}
</ol>


</form>
@section('scripts')
<script src="{{ asset('js/validar-form-anios.js') }}"></script>
@endsection

{!! csrf_field() !!}


<div class="alert alert-primary" role="alert">
        Datos del Año
</div>

<form id="formulario">

    <div class="row">
       <div class="col">
         {{ Form::label('nombre', 'año lectivo')}}
         {{ Form::text('nombre',null,['class' => 'form-control', 'id'=> 'nombre','onkeyup' => "validar_cantidad(this)", 'onblur' => "validar_cantidad(this)"]) }}
         <div class="invalid-feedback" style="display:none">
          El campo años debe tener un nombre de 4 digitos, por ejemplo 2015
        </div>
       </div>
       <div class="col">
         {{ Form::label('duracion', 'Duracion (Semanas)')}}
         {{ Form::text('duracion',null,['class' => 'form-control', 'id'=>'duracion','onblur' => "validar_numero(this)", 'onkeyup' => "validar_numero(this)"]) }}
         <div class="invalid-feedback" style="display:none">
          El numero debe estar entre 0 o 100
        </div>
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

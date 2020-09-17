{!! csrf_field() !!}


<hr>

<div class="alert alert-primary" role="alert">
        Datos de grado
      </div>

<form id="formulario">


        <div class="row">
           <div class="col">
             {{ Form::label('grado', 'Grado')}}
              {{ Form::text('grado',null,['class' => 'form-control', 'id'=>'grado','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)"]) }}
              <div class="invalid-feedback" style="display:none">
                El nombre del grado no debe comenzar con números ni caracteres especiales
              </div> 
             </div>
               <div class="col">
                {{ Form::label('seccion', 'Seccion')}}
                {{ Form::text('seccion',null,['class' => 'form-control', 'id'=>'seccion','onkeyup' => "validar_seccion(this)", 'onblur' => "validar_seccion(this)"]) }}
                <div class="invalid-feedback" style="display:none">
                  Debe agregar a la sección,por ejemplo B,b entre comillas dobles
                </div>
                </div>
                <div class="col">
                {{ Form::label('categoria', 'Categoria')}}
                {{ Form::text('categoria',null,['class' => 'form-control', 'id'=>'categoria','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)"]) }}
                <div class="invalid-feedback" style="display:none">
                  Debe seleccionar la categoria
                </div>
              </div>
        </div>

<br>
<ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit', 'disabled']) }}
</ol>



</form>


@section('scripts')
<script src="{{ asset('js/validar-form-grados.js') }}"></script>
@stop

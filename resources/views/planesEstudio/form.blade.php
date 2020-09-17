 
<link rel="stylesheet" href="css/estilos.css">
{!! csrf_field() !!}


<hr>

<div class="alert alert-primary" role="alert">
        Datos de plan de estudio
      </div>

<form id="formulario">


        <div class="row">
           <div class="col">
             {{ Form::label('nombre_plan', 'Nombre de Plan')}}
              {{ Form::text('nombre_plan',null,['class' => 'form-control', 'id' => 'nombre_plan', 'onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)"]) }}
              <div class="invalid-feedback" style="display:none">
                El nombre no debe comenzar con números ni caracteres especiales
            </div> 


             </div>
               <div class="col">
                {{ Form::label('duracion', 'Duracion')}}
                {{ Form::text('duracion',null,['class' => 'form-control', 'id' => 'duracion', 'onkeyup' => "validar_numero(this)", 'onblur' => "validar_numero(this)"]) }}
                <div class="invalid-feedback" style="display:none">
                  El numero debe estar entre 0 o 100
                </div>
                </div>
                

        </div>

        <br>

<ol class="float-sm-right">
  {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success', 'id' => 'btn_submit', 'disabled']) }}
  
   
</ol>

</form>


@section('scripts')
<script src="{{ asset('js/formulario.js') }}"></script>
@stop

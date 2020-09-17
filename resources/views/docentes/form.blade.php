{!! csrf_field() !!}


<hr>

<div class="alert alert-primary" role="alert">
        Datos Docente
</div>


<form id="formulario">


        <div class="row">
           <div class="col">
             {{ Form::label('nombre', 'Nombre')}}
             {{ Form::text('nombre',null,['class' => 'form-control', 'id'=> 'nombre', 'onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)"]) }}
             <div class="invalid-feedback" style="display:none">
              El nombre no debe comenzar con numeros ni caracteres especiales
            </div>
             </div>
               <div class="col">
                {{ Form::label('apellido', 'Apellidos')}}
                {{ Form::text('apellido',null,['class' => 'form-control', 'id'=> 'apellido','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)"]) }}
                <div class="invalid-feedback" style="display:none">
                  El apellido no debe comenzar con numeros ni caracteres especiales
                </div>
                </div>
                <div class="col">
                {{ Form::label('fecha_nacimiento', 'Fecha Nacimiento')}}
                {{ Form::date('fecha_nacimiento',null,['class' => 'form-control','id'=>'fecha_nacimiento','onkeyup' => "validar_fecha(this)", 'onblur' => "validar_fecha(this)"]) }}
                <div class="invalid-feedback" style="display:none">
                 Agregar una fecha de nacimiento valida
                </div>
              </div>
              <div class="col">
                {{ Form::label('telefono', 'Núm. Teléfono con Guión')}}
                {{ Form::text('telefono',null,['class' => 'form-control', 'id'=>'telefono','onkeyup' => "validar_telefono(this)", 'onblur' => "validar_telefono(this)"]) }}
                <div class="invalid-feedback" style="display:none">
                  El Teléfono se debe ingresar en un formato valido
                </div>
              </div>
        </div>

        <div class="row">
                <div class="col">
                        {{ Form::label('edad', 'Edad')}}
                        {{ Form::text('edad',null,['class' => 'form-control',  'readonly' => 'true', 'id' => 'edad','onkeyup' => "validar_edad(this)", 'onblur' => "validar_edad(this)"]) }}
                  </div>
                    <div class="col">
                        {{ Form::label('direccion', 'Direccion')}}
                        {{ Form::text('direccion',null,['class' => 'form-control', 'id'=>'direccion','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)"]) }}
                        <div class="invalid-feedback" style="display:none">
                          La direccion no debe comenzar con numeros ni caracteres especiales
                        </div>
                   </div>



                <div class="col">
                {{ Form::label('dui', 'DUI sin Guión')}}
                {{ Form::text('dui',null,['class' => 'form-control', 'id'=>'dui','onkeyup' => "validar_dui(this)", 'onblur' => "validar_dui(this)"]) }}
                <div class="invalid-feedback" style="display:none">
                  El DUI se debe ingresar en un formato valido
                </div>
                  </div>
                    <div class="col">
                        {{ Form::label('sexo', 'Sexo')}}
                      <div class="col">
                        <select name="sexo" id= "sexo" class="form-control" onblur="validar_select(this)" required autofocus>
                            <option value=""> Sexo del docente </option>
                            @foreach ($arraySexo as $arreglo)
                            <option value="{{ $arreglo }}"> {{ $arreglo}}</option>
                            @endforeach
                       </select>
                       <div class="invalid-feedback" style="display:none">
                        El Sexo no debe quedar vacío.
                     </div>
                    </div>
                  </div>



        </div>




<br>
<ol class="float-sm-right">
   {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success','id' => 'btn_submit', 'disabled']) }}
</ol>




</form>


@section('scripts')
<script type="">
        $(function(){
             $("#fecha_nacimiento").on('change', calcularEdad);
         });

         function calcularEdad() {

             fecha_nacimiento = $(this).val();
             var fecha_hoy = new Date();
             var cumpleanos = new Date(fecha_nacimiento);
             var edad = fecha_hoy.getFullYear() - cumpleanos.getFullYear();
             var m = fecha_hoy.getMonth() - cumpleanos.getMonth();

             if (m < 0 || (m === 0 && fecha_hoy.getDate() < cumpleanos.getDate())) {
                 edad--;
             }
             $("#edad").val(edad);
         }
</script>
<script src="{{ asset('js/validar-form-docente.js') }}"></script>
@stop

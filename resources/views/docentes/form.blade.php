{!! csrf_field() !!}

<div class="row">
        <div class="col">
           <label>Imagen</label>

           <br><input type="file" name="imagen" class="form-control-file" class="text-rigth">
        </div>


</div>

<hr>

<div id="msj_azul_fijo" class="alert alert-primary" role="alert">
        Datos Docente
</div>


<form id="formulario">


        <div class="row">
           <div class="col">
             {{ Form::label('nombre', 'Nombre')}}
             {{ Form::text('nombre',null,['class' => 'form-control', 'id'=> 'nombre', 'onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Nombre del Docente', 'required' => 'required','autofocus'=>'autofocus']) }}
             <div class="invalid-feedback" style="display:none">
              El nombre no debe comenzar con numeros ni caracteres especiales
            </div>
             </div>
               <div class="col">
                {{ Form::label('apellido', 'Apellidos')}}
                {{ Form::text('apellido',null,['class' => 'form-control', 'id'=> 'apellido','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Apellidos del Docente', 'required' => 'required','autofocus' => 'autofocus']) }}
                <div class="invalid-feedback" style="display:none">
                  El apellido no debe comenzar con numeros ni caracteres especiales
                </div>
                </div>
                <div class="col">
                {{ Form::label('fecha_nacimiento', 'Fecha Nacimiento')}}
                {{ Form::date('fecha_nacimiento',null,['class' => 'form-control','id'=>'fecha_nacimiento','onkeyup' => "validar_fecha(this)", 'onblur' => "validar_fecha(this)", 'required' => 'required','autofocus'=>'autofocus']) }}
                <div class="invalid-feedback" style="display:none">
                 Agregar una fecha de nacimiento valida
                </div>
              </div>
              <div class="col">
                {{ Form::label('telefono', 'Núm. Teléfono con Guión')}}
                {{ Form::text('telefono',null,['class' => 'form-control', 'id'=>'telefono','onkeyup' => "validar_telefono(this)", 'onblur' => "validar_telefono(this)", 'placeholder' => '7777-7777', 'required' => 'required','autofocus'=>'autofocus']) }}
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
                        {{ Form::text('direccion',null,['class' => 'form-control', 'id'=>'direccion','onkeyup' => "validar_nombre(this)", 'onblur' => "validar_nombre(this)", 'placeholder' => 'Ingresar la dirección de donde vive', 'required' => 'required','autofocus'=>'autofocus']) }}
                        <div class="invalid-feedback" style="display:none">
                          La direccion no debe comenzar con numeros ni caracteres especiales
                        </div>
                   </div>



                <div class="col">
                {{ Form::label('dui', 'DUI con Guión')}}
                {{ Form::text('dui',null,['class' => 'form-control', 'id'=>'dui','onkeyup' => "validar_dui(this)", 'onblur' => "validar_dui(this)", 'placeholder' => 'Ingresar Dui con guión', 'required' => 'required','autofocus'=>'autofocus' ]) }}
                <div class="invalid-feedback" style="display:none">
                  El dui solo puede contener 9 caracteres y debe agregar el guión donde corresponda
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
        <div class="form-group">
            {!! Form::label('turnos_id', 'Seleccione el Turno') !!}
            <div class="form-group">
                <select name="turnos_id" id= "turnos_id" class="form-control" onblur="validar_select(this)" required autofocus>
                    <option value="">--Turnos--</option>
                    @foreach ($turnos as $turno)
                    <option value="{{ $turno->id }}"> {{ $turno->nombre_turno}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback" style="display:none">
                  El Turno del docente no debe quedar vacío.
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

         //agregado para cambiar el valor del select por el recuperado de la base 
         $(document).ready(function(){
            $(function printOnSelect(){
              //si el formulario va a ser utilizado para editar mandara 1 en una bandera, si el formulario sera utilizado para crear , mandara 0
              var flag={!! json_encode($flag ?? '') !!};
              if(flag){
                var turnoOriginal={!! json_encode($turnoOriginal ??'') !!};
                //console.log(turnoOriginal);
                var turnos = {!! json_encode($turnos) !!}; 
                var comboSelect = document.getElementById('turnos_id');
                  for(var i=0;i<turnos.length;i++){
                    if(turnoOriginal===turnos[i]['id']){
                      //console.log(turnos[i]['id']);
                      document.getElementById("turnos_id").value = turnos[i]['id'];
                    }
                  }
              }
            });
          });
          //hasta aqui lo nuevo
</script>
<script src="{{ asset('js/validar-form-docente.js') }}"></script>




@stop

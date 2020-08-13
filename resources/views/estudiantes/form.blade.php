{!! csrf_field() !!}

<div class="row">
        <div class="col">
           <label>Imagen</label>

           <br><input type="file" name="imagen" class="form-control-file" class="text-rigth">
        </div>


</div>
<hr>

<div class="alert alert-primary" role="alert">
        Datos Personales Alumnas
      </div>

<form>


        <div class="row">
           <div class="col">
             {{ Form::label('nombre', 'Nombre')}}
              {{ Form::text('nombre',null,['class' => 'form-control']) }}

             </div>
               <div class="col">
                {{ Form::label('apellido', 'Apellidos')}}
                {{ Form::text('apellido',null,['class' => 'form-control']) }}
                </div>
                <div class="col">
                {{ Form::label('fecha_nacimiento', 'Fecha Nacimiento')}}
                {{ Form::date('fecha_nacimiento',null,['class' => 'form-control']) }}
              </div>
        </div>

        <div class="row">
                <div class="col">
                        {{ Form::label('edad', 'Edad')}}
                        {{ Form::text('edad',null,['class' => 'form-control',  'readonly' => 'true']) }}
                  </div>
                    <div class="col">
                        {{ Form::label('direccion', 'Direccion')}}
                        {{ Form::text('direccion',null,['class' => 'form-control']) }}
                   </div>


        </div>
     <hr>
     <div class="alert alert-primary" role="alert">
        Datos Personales del Responsable
      </div>
        <div class="row">
                <div class="col">
                        {{ Form::label('encargado', 'Encargado')}}
                        {{ Form::text('encargado',null,['class' => 'form-control']) }}

               </div>
                 <div class="col">
                        {{ Form::label('parentesco', 'Parentesco')}}
                        {{ Form::text('parentesco',null,['class' => 'form-control']) }}
                </div>
                <div class="col">
                        {{ Form::label('telefono_emergencia', 'Telefono de encargado')}}
                        {{ Form::text('telefono_emergencia',null,['class' => 'form-control']) }}
                </div>

     </div>
     <hr>
     <div class="alert alert-primary" role="alert">
        Enfermedades
      </div>

     <div class="row">
        <div class="col">
            {!! Form::label('padecimientos', 'Padecimientos') !!}
            <div class="col">
                <select name="padecimientos" id= "padecimientos" class="form-control" required>
                    <option value="">--------- ¿Tiene  algun Padecimiento? ---------</option>
                    @foreach ($arrayPadecimiento as $arreglo)
                    <option value="{{ $arreglo }}"> {{ $arreglo}}</option>
                    @endforeach
            </select>
          </div>
        </div>

         <div class="col">
                {{ Form::label('descripcion_padecimiento', 'Descripcion Padecimiento')}}
                {{ Form::text('descripcion_padecimiento',null,['class' => 'form-control']) }}
        </div>
        <div class="col">
                {{ Form::label('alergia_medicamento', 'Alergias del algun medicamento')}}
                {{ Form::text('alergia_medicamento',null,['class' => 'form-control']) }}
        </div>

</div>

<hr>
     <div class="alert alert-primary" role="alert">
        Datos Personales de Padres
      </div>

<div class="row">
        <div class="col">
                {{ Form::label('nombre_padre', 'Nombre padre')}}
        {{ Form::text('nombre_padre',null,['class' => 'form-control']) }}

       </div>
         <div class="col">
                {{ Form::label('profesion_padre', 'Profesion padre')}}
                {{ Form::text('profesion_padre',null,['class' => 'form-control']) }}
        </div>
        <div class="col">
                {{ Form::label('telefono_padre', 'Telefono padre')}}
                {{ Form::text('telefono_padre',null,['class' => 'form-control']) }}
        </div>
</div>
<div class="row">
        <div class="col">
                {{ Form::label('nombre_madre', 'Nombre madre')}}
                {{ Form::text('nombre_madre',null,['class' => 'form-control']) }}
        </div>

         <div class="col">
                {{ Form::label('profesion_madre', 'Profesion Madre')}}
                {{ Form::text('profesion_madre',null,['class' => 'form-control']) }}
        </div>
        <div class="col">
                {{ Form::label('telefono_madre', 'Telefono madre')}}
                {{ Form::text('telefono_madre',null,['class' => 'form-control']) }}
        </div>

</div>






<ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-lg btn-success']) }}
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
@stop

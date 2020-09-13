{!! csrf_field() !!}


<hr>

<div class="alert alert-primary" role="alert">
        Datos de grado
      </div>

<form>


        <div class="row">
           <div class="col">
             {{ Form::label('grado', 'Grado')}}
              {{ Form::text('grado',null,['class' => 'form-control']) }}

             </div>
               <div class="col">
                {{ Form::label('seccion', 'Seccion')}}
                {{ Form::text('seccion',null,['class' => 'form-control']) }}
                </div>

                <div class="col">
                    {{ Form::label('anios_id', 'Año')}}
                    {{ Form::text('anios_id',null,['class' => 'form-control']) }}
                    </div>



        </div>

        <div class="col">


<br>
        <div class="row">
            <div class="col">
                {{ Form::label('categoria', 'Categoria')}}

                <br>

<input type="radio" name="categoria" id="categoria" value="Tercer Ciclo">Tercer Ciclo<br>
<input type="radio" name="categoria" id="categoria" value="Bachillerato General">Bachillerato General<br>
<input type="radio" name="categoria" id="categoria" value="Bachillerato Vocacional">Bachillerato Vocacional<br>

              </div>
            </div>

<br>
<ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success']) }}
</ol>



</form>




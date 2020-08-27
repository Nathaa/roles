{!! csrf_field() !!}


<div class="alert alert-primary" role="alert">
        Datos del Año
</div>

<form>

    <div class="row">
       <div class="col">
         {{ Form::label('nombre', 'año lectivo')}}
         {{ Form::text('nombre',null,['class' => 'form-control']) }}
       </div>
       <div class="col">
         {{ Form::label('duracion', 'Duracion (Semanas)')}}
         {{ Form::text('duracion',null,['class' => 'form-control']) }}
       </div>

     </div>

     
 <br>
 <ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-lg btn-success']) }}
</ol>


</form>
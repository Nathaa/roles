{!! csrf_field() !!}


<div class="alert alert-primary" role="alert">
        Datos del Periodo
</div>

<form>

    <div class="row">
       <div class="col">
         {{ Form::label('nombre', 'Nombre')}}
         {{ Form::text('nombre',null,['class' => 'form-control']) }}
       </div>
       <div class="col">
         {{ Form::label('duracion', 'Duracion (Semanas)')}}
         {{ Form::text('duracion',null,['class' => 'form-control']) }}
       </div>

     </div>

     <div class="row">
         <div class="col">
            {{ Form::label('fecha_inicio', 'Fecha de Inicio')}}
            {{ Form::date('fecha_inicio',null,['class' => 'form-control']) }}
         </div>
         <div class="col">
             {{ Form::label('fecha_fin', 'Fecha de Finalizacion')}}
            {{ Form::date('fecha_fin',null,['class' => 'form-control']) }}
         </div>
     </div>
 <br>
 <ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-lg btn-success']) }}
</ol>


</form>






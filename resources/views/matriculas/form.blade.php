{!! csrf_field() !!}


<div class="alert alert-primary" role="alert">
        Datos de la Matrícula
</div>

<form>

    <div class="row">
       	{{ Form::label('nombre', 'Nombre')}}
        {{ Form::text('nombre',null,['class' => 'form-control']) }}
    </div>

    <div class="row">
        {{ Form::label('descripcion', 'Descripción')}}
        {{ Form::text('descripcion',null,['class' => 'form-control']) }}
     </div>
 <br>
 <ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-lg btn-success']) }}
</ol>


</form>
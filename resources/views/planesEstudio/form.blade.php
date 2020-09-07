{!! csrf_field() !!}


<hr>

<div class="alert alert-primary" role="alert">
        Datos de plan de estudio
      </div>

<form>


        <div class="row">
           <div class="col">
             {{ Form::label('nombre_plan', 'Nombre de Plan')}}
              {{ Form::text('nombre_plan',null,['class' => 'form-control']) }}

             </div>
               <div class="col">
                {{ Form::label('duracion', 'Duracion')}}
                {{ Form::text('duracion',null,['class' => 'form-control']) }}
                </div>

        </div>


<ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-lg btn-success']) }}
</ol>



</form>


@section('scripts')

@stop

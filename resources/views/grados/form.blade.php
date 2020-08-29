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
                {{ Form::label('categoria', 'Categoria')}}
                {{ Form::text('categoria',null,['class' => 'form-control']) }}
              </div>
        </div>


<ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-lg btn-success']) }}
</ol>



</form>


@section('scripts')

@stop

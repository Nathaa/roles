@extends('admin.index2')


@section('content')
<div class="container text-center" style="background-color: LightSteelBlue;">
    <i class="fa fa-book" style='font-size:36px;color : Gray'></i>
        <h4>Creación de Materias</h4>
</div>

<div class="panel panel-default">
    @if (session('notificacion'))
    <div class="alert alert-success ">
        {{ session('notificacion')}}
    </div>
    @endif


    @if (count($errors) > 0)
    <div class="alert alert-danger align=center" >
        <ul>
            @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="panel-body">

        {!! Form::open(array('url'=>'materias','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        

            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control"  style="width: 500px" placeholder="Nombre de la Materia">
            </div>
    
    
            <div class="form-group">
                <label for="descripcion"> Descripción </label>
                <input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control"  style="width: 800px" placeholder="Breve descripcion sobre la Materia">
            </div>

            
            <div class="form-group">
                <button class="btn btn-primary btn-flat" type="submit"> Guardar </button>
                <a href="{{ route('materias.index') }}" class="btn btn-default btn-flat">Cancelar</a>
            <!--<button class="btn btn-danger" href="{{ route('materias.index') }}" type="reset"> Cancelar </button>-->
            </div>

        {!! Form::close()!!}
    
    </div>


</div>

 
@endsection


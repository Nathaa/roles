@extends('admin.index2')


@section('content')
<div class="container text-center" style="background-color: LightSteelBlue;">
    <i class="fa fa-book" style='font-size:36px;color : Gray'></i>
<h4>Edición de Materias : {{ $materia->nombre }}</h4>
</div>

<div class="row">
    @if (session('notificacion'))
    <div class="alert alert-success ">
        {{ session('notificacion')}}
    </div>
    @endif
    
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        
        {!! Form::model($materia,['method'=>'PATCH','route'=>['materias.update', $materia->id]])!!}
        {{Form::token()}}
            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" name="nombre" value="{{ $materia->nombre }}" class="form-control" style="width: 500px" placeholder="Nombre de la Materia">
            </div>
    
    
            <div class="form-group">
                <label for="descripcion"> Descripcion </label>
                <input type="text" name="descripcion" value="{{ $materia->descripcion }}" class="form-control" style="width: 800px" placeholder="Breve descripcion sobre la Materia">
            </div>

            
            <div class="form-group">   
                <label for="estado"> Estado  </label>
                <select name="estado" class="form-control" style="width: 500px" required="required">
                    <option value="" disabled selected>Elige el Estado de la Materia</option>
                    <option value="1">1 - Activo (La materia esta siendo Impartida) </option>
                    <option value="0">0 - Inactivo (La materia ya no se imparte) </option>
                </select>
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
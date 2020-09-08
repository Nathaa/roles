@extends('admin.index2')


@section('title')

@endsection
@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="{{ route('usuarios.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div>
@endsection
@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <b> Nuevo Usuario</b>
                </div>

                <div class="panel-body">

                 {!! Form::open(['route' => 'usuarios.store','files'=> true]) !!}
                 <enctype="multipart/form-data">
                 @include('usuarios.form')



                 {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


@endsection

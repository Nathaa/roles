@extends('admin.index2')


@section('title')
<h3>Modificando al Usuario: {{ $user->name }}</h3>
@endsection

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
        <a href="{{ route('usuarios.index') }}" class="btn btn-sm btn-dark pull-rigth" > Regresar atras</a>


  </ol>
</div>
@endsection
@section('content')
<div class="container">
    <div class="card">

       <div class="card-boady">
        <table class="table table-bordered table-hover">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                 {!! Form::model($user, ['route' => ['usuarios.update', $user->id],
                 'method' =>'PUT'])  !!}
                 <enctype="multipart/form-data">
                 <img width="150px" src="{{ $user->imagen }}" class="img-responsive">
                 @include('usuarios.form')
                 {!! Form::close() !!}



                </table>

        </div>

    </div>
</div>

@endsection

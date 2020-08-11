@extends('admin.index2')


@section('title')
<h3>Nuevo Usuario</h3>
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

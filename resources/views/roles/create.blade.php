@extends('admin.index2')

@section('title')
<h3>Nuevo Rol</h3>
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
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
                 Roles
                </div>

                <div class="panel-body">
                 {!! Form::open(['route' => 'roles.store']) !!}

                 @include('roles.form')

                 {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

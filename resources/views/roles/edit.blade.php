@extends('admin.index2')

@section('title')
<h5><strong>Modificando: {{ $role->name  }}</strong> </h5>
@endsection

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="{{ route('roles.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div>
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <table class="table table-bordered table-hover">
        {!! Form::model($role, ['route' => ['roles.update', $role->id],
        'method' =>'PUT'])  !!}

        @include('roles.form')
        {!! Form::close() !!}
      </table>
    </div>
  </div>
</div>
@endsection
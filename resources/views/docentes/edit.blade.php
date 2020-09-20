@extends('admin.index2')

@section('title')
<h5><strong>Modificando:{{ $docente->nombre  }} {{ $docente->apellido  }}</strong> </h5>
@endsection

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="{{ route('docentes.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div>
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <form method="POST"
        {!! Form::model($docente, ['route' => ['docentes.update', $docente->id],
        'method' =>'PUT', 'files' => true])  !!}
        <enctype="multipart/form-data">

        @include('docentes.form')
        {!! Form::close() !!}
      </table>
    </div>
  </div>
</div>
@endsection

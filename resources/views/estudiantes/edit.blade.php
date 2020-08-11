@extends('admin.index2')
@section('title')
<h3>Modificando Expediente de: {{ $estudiante->nombre }}</h3>
@endsection
@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
        <a href="{{ route('estudiantes.index') }}" class="btn btn-sm btn-dark pull-rigth" > Regresar atras</a>


  </ol>
</div>
@endsection
@section('content')
<div class="container">
    <div class="card">

       <div class="card-boady">
        <table class="table table-bordered table-hover">

                        <form method="POST"
                        {!! Form::model($estudiante, ['route' => ['estudiantes.update', $estudiante->id],
                        'method' =>'PUT', 'files' => true])  !!}
                        <enctype="multipart/form-data">


                        <img width="150px" src="{{ $estudiante->imagen }}" class="img-responsive">
                        @include('estudiantes.form')
                       {!! Form::close() !!}
                </div>
            </div>
            <div class="card-footer">

            </table>
        </div>
    </div>
</div>
@endsection

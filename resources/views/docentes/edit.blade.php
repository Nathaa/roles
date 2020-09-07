@extends('admin.index2')
@section('title')
<h3>Modificando al Docente: {{ $docente->nombre }}{{ $docente->apellido }}</h3>
@endsection
@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
        <a href="{{ route('docentes.index') }}" class="btn btn-sm btn-dark pull-rigth" > Regresar atras</a>


  </ol>
</div>
@endsection
@section('content')
<div class="container">
    <div class="card">

       <div class="card-boady">
        <table class="table table-bordered table-hover">

                        <form method="POST"
                        {!! Form::model($docente, ['route' => ['docentes.update', $docente->id],
                        'method' =>'PUT', 'files' => true])  !!}
                        <enctype="multipart/form-data">


                        
                        @include('docentes.form')
                       {!! Form::close() !!}

            <div class="card-footer">

            </table>
           </div>
    </div>
    </div>
</div>
@endsection

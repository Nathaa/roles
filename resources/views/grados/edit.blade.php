@extends('admin.index2')
@section('title')
<h3>Modificando Datos De Grado : {{ $grado->grado }} {{$grado->seccion}}</h3>
@endsection
@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
        <a href="{{ route('grados.index') }}" class="btn btn-sm btn-dark pull-rigth" > Regresar atras</a>


  </ol>
</div>
@endsection
@section('content')
<div class="container">
    <div class="card">

       <div class="card-boady">
        <table class="table table-bordered table-hover">

                        <form method="POST"
                        {!! Form::model($grado, ['route' => ['grados.update', $grado->id],
                        'method' =>'PUT', 'files' => true])  !!}
                        <enctype="multipart/form-data">



                        @include('grados.form')
                       {!! Form::close() !!}
                </div>
            </div>
            <div class="card-footer">

            </table>
        </div>
    </div>
</div>
@endsection

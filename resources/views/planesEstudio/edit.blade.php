@extends('admin.index2')
@section('title')
<h3>Modificando Datos De Plan : {{ $planEstudio->nombre_plan }} </h3>
@endsection
@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
        <a href="{{ route('planesEstudio.index') }}" class="btn btn-sm btn-dark pull-rigth" > Regresar atras</a>


  </ol>
</div>
@endsection
@section('content')
<div class="container">
    <div class="card">

       <div class="card-boady">
        <table class="table table-bordered table-hover">

                        <form method="POST"
                        {!! Form::model($planEstudio, ['route' => ['planesEstudio.update', $planEstudio->id],
                        'method' =>'PUT', 'files' => true])  !!}
                        <enctype="multipart/form-data">



                        @include('planesEstudio.form')
                       {!! Form::close() !!}
                </div>
            </div>
            <div class="card-footer">

            </table>
        </div>
    </div>
</div>
@endsection

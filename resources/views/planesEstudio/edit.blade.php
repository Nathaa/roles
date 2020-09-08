@extends('admin.index2')
@section('title')
<h5><strong>Modificando: {{ $planEstudio->nombre_plan }}</strong> </h5>
@endsection
@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="{{ route('planesEstudio.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div>
@endsection
@section('content')
<div class="container">
    <div class="card">

       <div class="card-body">
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

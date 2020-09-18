@extends('admin.index2')

@section('title')
<h5><strong>Modificando: {{ $turno->nombre_turno }}</strong> </h5>
@endsection

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="{{ route('turnos.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>
  </ol>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card">
       <div class="card-body">
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

                <form method="POST"
                {!! Form::model($turno, ['route' => ['turnos.update', $turno->id],
                'method' =>'PUT'])  !!}
                <enctype="multipart/form-data">
             
                @include('turnos.form')
                {!! Form::close() !!}
            </table>
        </div>
    </div>
</div>
@endsection


@extends('admin.index2')


@section('title')
<h3>Editando el Periodo: {{ $periodo->nombre }}</h3>
@endsection

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
        <a href="{{ route('periodos.index') }}" class="btn btn-sm btn-dark pull-rigth" > Regresar atras</a>


  </ol>
</div>
@endsection
@section('content')
<div class="container">
    <div class="card">

       <div class="card-boady">
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
                 {!! Form::model($periodo, ['route' => ['periodos.update', $periodo->id],
                 'method' =>'PUT'])  !!}
                 <enctype="multipart/form-data">
                 <
                 @include('periodos.form')
                 {!! Form::close() !!}



                </table>

        </div>

    </div>
</div>

@endsection

@extends('admin.index2')

@section('title')

@endsection
@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="{{ route('roles.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div>
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
    <div class="card">

       <div class="card-body">
        <table class="table table-bordered table-hover">
                 {!! Form::open(['route' => 'roles.store']) !!}

                 @include('roles.form')

                 {!! Form::close() !!}

                </div>
            </div>
            <div class="card-footer">

            </table>
        </div>
    </div>
</div>
@endsection

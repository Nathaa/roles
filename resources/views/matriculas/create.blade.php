@extends('admin.index2')


@section('crear')
<div class="col-sm">
  <ol class="breadcrumb float-sm-right">
    <a href="{{ route('matriculas.index') }}" class="btn btn-sm  btn-dark" >Regresar atras</a>
  </ol>
</div>
@endsection

@section('title')
<h3>Nueva Matrícula</h3>
@endsection


@section('content')
@if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="card">

           <div class="card-boady">
            <table class="table table-bordered table-hover">

                 {!! Form::open(['route' => 'matriculas.store','files'=> true]) !!}
                 @include('matriculas.form')

                 {!! Form::close() !!}

            </table>
        </div>
    </div>
 </div>
@endsection

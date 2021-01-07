@extends('admin.index2')


@section('crear')
<div class="col-sm">
  <ol class="breadcrumb float-sm-right">
    <a href="{{ route('asignaciones.index') }}" class="btn btn-xs  btn-dark" >Regresar atras</a>
  </ol>
</div>
@endsection

@section('title')

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

           <div class="card-body">
            <table class="table table-bordered table-hover">

                 {!! Form::open(['route' => 'asignaciones.store','files'=> true]) !!}
                 <enctype="multipart/form-data">
                 @include('asignaciones.form')

                 {!! Form::close() !!}

            </table>
        </div>
    </div>
 </div>

@endsection

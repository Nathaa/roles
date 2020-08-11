@extends('admin.index2')
@section('title')
<h3>Modificando Roles</h3>
@endsection
@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-dark pull-rigth" > Regresar atras</a>


  </ol>
</div>
@endsection

@section('content')

<div class="container">
    <div class="card">

       <div class="card-boady">
        <table class="table table-bordered table-hover">


                        {!! Form::model($role, ['route' => ['roles.update', $role->id],
                        'method' =>'PUT'])  !!}




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

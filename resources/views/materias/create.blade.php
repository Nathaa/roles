@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">

        <li class="breadcrumb-item active"><a href="{{ route('materias.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

    </ol>
</div>
@endsection


@section('content')
@if(count($errors)>0)
        <div class="alert alert-info alert-dismissible" id="msj_error" role="alert">
                @foreach($errors->all() as $error)
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <li>{{ $error }}</li>
                @endforeach
        </div>
    @endif
    <div class="container">
        <div class="card">

           <div class="card-body">
            <table class="table table-bordered table-hover">

                 {!! Form::open(['route' => 'materias.store','files'=> true]) !!}
                 <enctype="multipart/form-data">
                 @include('materias.form')

                 {!! Form::close() !!}

            </table>
        </div>
    </div>
 </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/funciones.js') }}"></script>
@stop
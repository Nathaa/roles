@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @can('roles.edit')
    <li class="breadcrumb-item active"><a href="{{ route('roles.edit', $role->id)}}"><button type="button" class="btn btn-secondary  btn-xs"><i class="fas fa-edit"></i>Editar role</button></a></li>
    @endcan
    <li class="breadcrumb active"><a href="{{ route('roles.index')}}" ><button type="button" class="btn btn-dark  btn-xs"><i class="fas fa-arrow-alt-circle-left"></i>Regresar atras</button></a></li>

  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h5><strong>{{ $role->nombre  }}</strong> </h5>
@endsection

@section('content')
<div class="container">
    <div class="card">

       <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="bg-primary">
                <tr>
                <th>Datos Personales Roles</th>
                </tr>

               </thead>
        </table>
    <table class="table table-bordered table-hover">



        <tbody>


              <tr>
                 <th scope="row"><strong>Nombre:</strong></th>
                 <td> <p> {{$role->name}}</p></td>
             </tr>
              <tr>
                  <th scope="row"><strong>Slug: </strong></th>
                  <td><p> {{ $role->slug }}</p></td>
              </tr>
               <tr>
                   <th scope="row"><strong>Descripcion:</strong></th>
                   <td><p> {{$role->description}}</p></td>
             </tr>



       </tbody>
   </table>

</div>
</div>
</div>


@endsection

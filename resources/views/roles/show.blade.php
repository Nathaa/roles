@extends('admin.index2')

@section('crear')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active"><a href="{{ route('roles.edit', $role->id)}}">Editar Roles</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('roles.index', $role->id)}}">Regresar atras</a></li>
  </ol>
</div><!-- /.col -->
@endsection
@section('title')
<h3>Informacion del Rol </h3>
@endsection

@section('content')
<div class="container">
    <div class="card">

       <div class="card-boady">
        <table class="table table-bordered table-hover">
            <thead class="bg-primary">
                <tr>
                <th>Informacion Roles</th>
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

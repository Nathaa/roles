@extends('admin.index2')

@section('content')
  <h6>
   @if($search)
  <div class="alert alert-info" role="alert">
    Los resultados de tu busqueda {{ $search }} son
  </div>
  @endif
 </h6>

 <div class="container-fluid">
    <div class="card">
        <div class="card-header">


        </div>


        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('reportes.index') }}"><i class="fa fa-align-justify"></i> Listado reportes de notas</a>
                </div>
            </div>
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Nombre</th>
           <th scope="col">Opcion</th>

         </tr>
       </thead>
       <tbody>
          @foreach ($reportes as $reporte)
           <tr>
            <td>{{$reporte->nombre}}</td>


                <td width="">
                @can('reportes.show')
                <a href="{{route('reportes.show',  $reporte->id) }}" > <button type="button" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>Generar Reporte de Notas </button> </a>


                @endcan

           </tr>

         @endforeach

       </tbody>
      </table>
      <br>
            <div class="row">
              <div class="mr-auto">
                {{$reportes->links()}}
              </div>
            </div>
</div>
</div>
</div>
</div>
@endsection

@extends('admin.index2')

@section('content')

 <div class="container-fluid">
    <div class="card">
        <div class="card-header">


        </div>
        <div class="d-flex justify-content-end mb-3">
        
        <a class="btn btn-primary" href="{{ url('/imprimir',$x) }}">Descargar Boleta</a>
       
        </div>
        <img src="../img/logo.jpg" width="100" height="100" />
        
        <div class="card-body">
            
           @foreach($datos as $d)
            <p> Alumna: {{$d->nombre}} </p> <br/>
            <p> Grado: {{$d->grado}} </p> <br/>
            <p> Periodo: {{$d->nombre_periodo}} </p> <br/>
            @endforeach
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Nombre</th>
           <th scope="col">Examen 1</th>
           <th scope="col">Examen 2</th>
           <th scope="col">Examen 3</th>
           <th scope="col">Tarea 1</th>
           <th scope="col">Tarea 2</th>
           <th scope="col">Promedio</th>
           <th scope="col">Estado</th>

         </tr>
       </thead>
       <tbody>
          @foreach($reportes as $reporte)
           <tr>
            <td>{{$reporte->nombre}}</td>
            <td>{{$reporte->examen1}}</td>
            <td>{{$reporte->examen2}}</td>
            <td>{{$reporte->examen3}}</td>
            <td>{{$reporte->tarea1}}</td>
            <td>{{$reporte->tarea2}}</td>
            <td>{{$reporte->promedio}}</td>
            <td>{{$reporte->estado}}</td>

           </tr>

         @endforeach

       </tbody>
      </table>
      <br>
            <div class="row">
              <div class="mr-auto">
              
              </div>
            </div>
</div>
</div>
</div>
</div>


@endsection


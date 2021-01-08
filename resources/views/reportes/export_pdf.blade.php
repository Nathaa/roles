

@section('content')

 <div class="container-fluid">
    <div class="card">
        <div class="card-header">


        </div>
        
        <div class="card-body">
            
            <table class="table table-bordered thead-dark table-hover table-sm">
         <tr>

           <th scope="col">Nombre</th>
           <th scope="col">Examen 1</th>
           <th scope="col">Examen 2</th>
           <th scope="col">Tarea 1</th>

         </tr>
       </thead>
       <tbody>
          @foreach($pdf as $reporte)
           <tr>
            <td>{{$reporte->nombre}}</td>
            <td>{{$reporte->examen1}}</td>
            <td>{{$reporte->examen2}}</td>
            <td>{{$reporte->tarea1}}</td>

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


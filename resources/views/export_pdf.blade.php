<div class="container-fluid">
    <div class="card">
        <div class="card-header">

        
                            <img src="img/logo.jpg" width="100" height="100" />
                        
        </div>
        
        <div class="card-body">
            

            @foreach($datos as $d)
            <p> Alumna: {{$d->nombre}} </p> <br/>
            <p> Grado: {{$d->grado}} </p> <br/>
            <p> Periodo: {{$d->nombre_periodo}} </p> <br/>
            @endforeach

            <table border="1">
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
            <td align='right'>{{$reporte->examen1}}</td>
            <td align='right'>{{$reporte->examen2}}</td>
            <td align='right'>{{$reporte->examen3}}</td>
            <td align='right'>{{$reporte->tarea1}}</td>
            <td align='right'>{{$reporte->tarea2}}</td>
            <td align='right'>{{$reporte->promedio}}</td>
            <td align='center'>{{$reporte->estado}}</td>

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

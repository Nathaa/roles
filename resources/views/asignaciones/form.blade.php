{!! csrf_field() !!}


<div class="alert alert-primary" role="alert">
        Datos del Año
</div>

<form>


            <div class="card-body">
                <table class="table table-bordered col-md-8 col-md-offset-2 thead-dark table-hover table-sm">
                    <tr>

                      <th scope="col">Grados</th>
                      <th scope="col">Categoria</th>
                    </tr>
                    <tbody>

                        @foreach ($grados as $grado)
                        <tr>
                            <td>
                                <select name="grados_id" id="grados_id" class="form-control" style="font-size: 17px;">
                                    <option value="">Seleccione Grado</option>

                                            <option value="{{ $grado->id }}">
                                                {{ $grado->grado }}
                                            </option>

                                    </select>

                            </td>
                            <td>{{ $grado->categoria }}</td>
                        </tr>
                        @endforeach
                             </tbody>
                </table>

            </div>

    <div class="row">
       <div class="col">

       </div>
       <div class="col">
        <div class="form-group">
            <ul class="list-unstyled">
               @foreach($periodos as $periodo)
               <li>
                   <label>
                  {{ Form::checkbox('periodos[]', $periodo->id, null) }}
                  {{ $periodo->nombre }}
                   </label>
               </li>

               @endforeach
            </ul>
          </div>
       </div>

     </div>
     <div class="row">
        <div class="form-group">
            <ul class="list-unstyled">
               @foreach($materias as $materia)
               <li>
                   <label>
                  {{ Form::checkbox('materias[]', $materia->id, null) }}
                  {{ $materia->nombre }}
                   </label>
               </li>

               @endforeach
            </ul>
          </div>
        </div>

 <br>
 <ol class="float-sm-right">
    {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success']) }}
</ol>


</form>


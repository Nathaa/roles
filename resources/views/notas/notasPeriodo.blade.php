@extends('admin.index2')

@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h4>Asignar las notas para la materia: <strong>{{$nombremateria}}</strong>  <br>Grado: <strong> {{$gradogrado}} {{$secciongrado}} {{$categoriagrado}} </strong></h4>
@endsection
@section('content')
<div class="container">
<div class="container-fluid">
<div class="container">
    <div class="container-fluid">
        <h4><strong>Digite las notas de las estudiantes y de click en guardar notas</strong></h4>
        <form   action="{{ route('notas.guardarNotasIngresadas', ['idgrado'=>$idgrado, 'idmateria'=>$idmateria, 'periodo'=>$periodoSelecc, 'anioID'=>$anioID])}}" method="POST"  >
            @csrf
        <br>
        <tr>
            <div class="form-group">
         <table class="table">
            <tr class="thead-dark">
                <th scope="col">Nombres Estudiante</th>
                <th scope="col">Apellidos Estudiante</th>
                @foreach ($notasLlenar as $nota)
                <th scope="col">Nota: {{$nota->tipo_nota}}</th>
                @endforeach
            </tr>

            <tbody>
                <?php $i=0;?>
                @foreach ($estudiantes as $estudiante)
                <tr>
                    <th>
                        <input type="hidden" id="idestu" name="idestu[]" value="{{$estudiante[$i]->id}}">
                        {{$estudiante[$i]->nombre}}
                    </th>
                    <th>
                        {{$estudiante[$i]->apellido}}
                    </th>
                    @foreach ($notasLlenar as $nota)
                    <input type="hidden" id="tipo_nota" name="tipo_nota[]" value="{{$nota->tipo_nota}}">
                    <input type="hidden" id="ponderacion" name="ponderacion[]" value="{{$nota->ponderacion}}">
                    <th scope="col">{{ Form::number('valor_nota',null,['class' => 'form-control' , 'step'=>'0.01', 'id'=> 'valor_nota','name' => 'nombreNota[]' , 'placeholder' => 'digite la nota','onkeyup' => 'validar_numero(this)', 'onblur' => 'validar_numero(this)', 'required' => 'required','autofocus'=>'autofocus']) }}</th>
                    <div class="invalid-feedback" style="display:none">
                        El numero debe estar entre 0 y 10
                      </div>
                    @endforeach
                </tr>
                <?php $i++;?>
                @endforeach
            </tbody>
        </table>
          </div>
          </tr>
      <br>
      <button type="submit" class="btn  btn-success float-sm-left">Guardar Notas</button>
    </form>
    </div>
</div>
      </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function validar_numero(input) {
    let valor = Number(input.value);
    if (!isNaN(valor)) {
        if (valor >= 0 && valor <= 10) {
            valido(input);
        } else {
            invalido(input);
        }
    } else {
        invalido(input);
    }
    submit_form();
}

</script>
@endsection

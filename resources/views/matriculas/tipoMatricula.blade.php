@extends('admin.index2')

@section('title')
<h3>Seleccionar el Tipo de Matricula </h3>
@endsection


@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">


                {{-- {!! Form::open(['route' => 'matriculas.dataTable','files'=> true ]) !!} --}}
                <form  action="{{ route('matriculas.dataTable')}}" method="POST"  >
                    @csrf

                    <input type="radio" name="tipo" id="inscNormal" value="Normal"> Inscripcion en periodo normal<br>
                    <br>
                    <input type="radio" name="tipo" id="inscExtemp" value="Extemporanea"> Inscripcion en periodo extraordinario<br>
                    <br>

                    <ol class="float-sm-right">
                        <p><button type="submit" class="btn  btn-sm btn-success" id="btnContinuar">Continuar</button></p>
                       {{--  {{ Form::submit('     Guardar     ', ['class' => 'btn  btn-sm btn-success']) }} --}}
                    </ol>



                </form>
                {{-- {!! Form::close() !!} --}}




            </div>
        </div>
    </div>


@endsection

@section('scripts')
<script>
    $(document).ready(function(){

        $(function anioLectivoSiguiente(){
            $.get('/matricula/anioLectivoSiguiente',function (datos1){
                var check = datos1;
                console.log(datos1);
            if(check =="NoExiste"){
                alert("No existe año lectivo, si se desea inscribir para el siguiente año ,por favor registrar un nuevo año");
                var btn=document.getElementById("inscNormal").disabled=true;

            }

            });
        });
    });
</script>
@stop

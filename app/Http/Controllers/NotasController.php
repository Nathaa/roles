<?php

namespace App\Http\Controllers;
use Symfony\Component\Console\Output\ConsoleOutput;
use App\Anio;
use App\Asignacion;
use App\Grado;
use App\Matricula;
use App\Materia;
use App\Nota;
use App\Estudiante;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class NotasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function buscarMaterias(Request $request)
    {
        if($request){
            $fecha_actual=Carbon::createFromFormat('d/m/Y', date('d/m/Y'));
            $fechaActualSoloAnio=substr($fecha_actual, 0,-15); //extraigo solo el anio a tipo string
            $materiasS=DB::table('materias')
            ->join('asignacions','asignacions.materias_id','=','materias.id')
            ->join('grados','grados.id','=','asignacions.grados_id')
            ->join('anios','anios.id','=','grados.anios_id')
            ->where('materias.estado', 'true')
            //->where('anios.año', $fechaActualMismoAnioLectivo)
            ->select('materias.nombre','grados.grado','grados.seccion', 'grados.categoria','grados.id')
            ->get()->toArray();
            return view('notas.confignotas', ['materias' => $materiasS]);
        }
    }

    public function editarNotas($grado, $seccion , $nombre){
        $gradoObtenido = $grado;
        $seccionObtenido = $seccion;
        $nombreObtenido = $nombre;
        $anioActual = (int)date('Y');
        $match =['año'=> $anioActual];
        $anioId = Anio::where($match)->select('id')->get();
        $match = ['grado' => $grado, 'seccion' => $seccion];
        $grados= Grado::where($match)->select('id', 'grado', 'seccion', 'categoria', 'anios_id')->get();
        $estado = "true";
        $match = ['nombre' => $nombreObtenido, 'estado' => $estado];
        $materias = Materia::where($match)->select('id', 'nombre')->get();
        $materiaId = (int)$materias[0]->id;
        $match = ['grados_id'=> (int)$grados[0]->id];
        $periodos = Asignacion::where($match)->select('periodos_id')->get();
        $numperiodos = 0;
        foreach ($periodos as $periodo) {
           if (!($periodo->periodos_id) == null) {
               $numperiodos ++;
           }
        }
        return view('notas.editarnotas', compact('materias', 'grados','numperiodos','anioId', 'periodos'));
    }


    public function guardarNotas(Request $request){
        $nota=$request['nombreNota'];
        $idmateria =$request["idMateria"];
        $idgrado =$request["idGrado"];
        $anioID =$request["anioID"];
        $ponderacion=$request['ponderacion'];
        $match = ['grados_id' => (int)$idgrado];
        $valorPeriodo = $request['periodo'];
        $estudiantes = Matricula::where($match)->select('estudiantes_id')->get();
        foreach ($estudiantes as $estudiante) {
            for($i = 0; $i < count($nota); $i++){
                $notas = Nota::create([
                    'anios_id'=>$anioID,
                    'estudiantes_id'=> $estudiante->estudiantes_id,
                    'materias_id'=>$idmateria,
                    'grados_id'=>$idgrado,
                    'periodos_id'=>$valorPeriodo,
                    'tipo_nota'=>$nota[$i],
                    'ponderacion'=>$ponderacion[$i],
                ]);
                $notas->save();
            }
        }
        return view('admin.index2');
    }

    public function ingresoNotas($grado, $seccion , $nombre){
        $gradoObtenido = $grado;
        $seccionObtenido = $seccion;
        $nombreObtenido = $nombre;
        $anioActual = (int)date('Y');
        $match =['año'=> $anioActual];
        $anioId = Anio::where($match)->select('id')->get();
        $match = ['grado' => $grado, 'seccion' => $seccion];
        $grados= Grado::where($match)->select('id', 'grado', 'seccion', 'categoria', 'anios_id')->get();
        $estado = "true";
        $match = ['nombre' => $nombreObtenido, 'estado' => $estado];
        $materias = Materia::where($match)->select('id', 'nombre')->get();
        $materiaId = (int)$materias[0]->id;
        $match = ['grados_id'=> (int)$grados[0]->id];
        $periodos = Asignacion::where($match)->select('periodos_id')->get();
        $numperiodos = 0;
        foreach ($periodos as $periodo) {
           if (!($periodo->periodos_id) == null) {
               $numperiodos ++;
           }
        }
        return view('notas.ingresoNotas', compact('materias', 'grados','numperiodos','anioId', 'periodos'));
    }
    public function notasPeriodo(Request $request){
        $idmateria =$request["idMateria"];
        $nombremateria =$request["nombreMateria"];
        $periodoSelecc = $request['periodo'];
        $idgrado =$request["idGrado"];
        $categoriagrado =$request["categoriaGrado"];
        $gradogrado =$request["gradoGrado"];
        $secciongrado =$request["seccionGrado"];

        $anioID =$request["anioID"];
        $match = ['grados_id' => (int)$idgrado];
        $estudiantesMatricula = Matricula::where($match)->select('estudiantes_id')->get();
        $estudiantes =[];
        $i =0;
        foreach ($estudiantesMatricula as $estudiante) {
                $match = $estudiante->id;
                $estudiantes[$i] = Estudiante::where($match)->select('id', 'nombre','apellido')->get();
                $estudianteInd = $estudiantes[$i];
                $i++;
        }
        $match = ['grados_id'=>(int)$idgrado, 'materias_id'=>$idmateria,'periodos_id'=>$periodoSelecc,'estudiantes_id'=> (int)$estudianteInd[0]->id ];
        $notasLlenar = Nota::where($match)->select('id','tipo_nota')->get();
        return view('notas.notasPeriodo', compact('estudiantes', 'periodoSelecc', 'idmateria','nombremateria',
        'idgrado','gradogrado','secciongrado','categoriagrado', 'notasLlenar'));
    }


    public function guardarNotasIngresadas(Request $request){
        $nota=$request['nombreNota'];
        $idmateria=$request['idmateria'];
        $idgrado=$request['idgrado'];
        $periodo=$request['periodo'];
        $estudiantes=$request['idestu'];
        $match = ['grados_id'=>(int)$idgrado, 'materias_id'=>$idmateria,'periodos_id'=>$periodo,'estudiantes_id'=> (int)$estudiantes[0] ];
        $notasLlenar = Nota::where($match)->select('id','tipo_nota')->get();
        $j=0;
        for($i = 0; $i < count($estudiantes); $i++){
            $id=$estudiantes[$i];
            for ($k=0; $k < count($notasLlenar); $k++) {
                DB::table('notas')
                ->where([['estudiantes_id' , '=', $id], ['materias_id', '=', $idmateria], ['grados_id', '=', $idgrado]])
                ->update(['valor_nota' => $nota[$j]]);
                $j++;
            }
        }
        return view('admin.index2');
    }
}

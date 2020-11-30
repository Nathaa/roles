<?php

namespace App\Http\Controllers;
use Symfony\Component\Console\Output\ConsoleOutput;
use App\Anio;
use App\Asignacion;
use App\Grado;
use App\Periodo;
use App\Materia;
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
            $fechaActualMismoAnioLectivo=(int)$fechaActualSoloAnio;//convertir string a int
            $anioActual = (int)date('Y') + 1;
            $materias=DB::table('materias')
            ->join('asignacions','asignacions.materias_id','=','materias.id')
            ->join('grados','grados.id','=','asignacions.grados_id')
            ->join('anios','anios.id','=','grados.anios_id')
            ->where('materias.estado', 'true')
            //->where('anios.año', $fechaActualMismoAnioLectivo)
            ->select('materias.nombre','grados.grado','grados.seccion', 'grados.categoria','grados.id')
            ->get()->toArray();
            return view('notas.confignotas', ['materias' => $materias]);
        }
    }

    public function editarNotas($grado, $seccion , $nombre){
        $gradoObtenido = $grado;
        $seccionObtenido = $seccion;
        $nombreObtenido = $nombre;
        $anioActual = (int)date('Y') + 1;

        $match =['año'=> $anioActual];
        $anioId = Anio::where($match)->select('id')->get();

        $match = ['grado' => $grado, 'seccion' => $seccion, 'anios_id' => (int)$anioId[0]->id];
        $grados= Grado::where($match)->select('id', 'grado', 'seccion', 'categoria', 'anios_id')->get();



        $estado = "true";
        $match = ['nombre' => $nombreObtenido, 'estado' => $estado ];
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
        return view('notas.editarnotas', compact('materias', 'grados','numperiodos'));
    }


    public function guardarNotas(Request $request){

        $output = new ConsoleOutput();
        $periodoSeleccionado = $request->input('periodo');
        $output->writeln($periodoSeleccionado);
        foreach ($request->input('ponderacion') as $ponderacion) {
            $output->writeln($ponderacion);
        }
        //$ponderacion= $request->input('ponderacion');

    }
}

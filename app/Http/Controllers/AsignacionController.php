<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Asignacion;
use Session;
use App\Grado;
use App\Materia;
use App\Periodo;
use DB;
use Illuminate\Support\Arr;


class AsignacionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

    $asignaciones=Asignacion::paginate();


        if ($request)
        {
            //------------------Esto pinta la primera forma de como se presentan los datos ordenados en la tabla
            $asignaciones=DB::table('asignacions')
             ->join('grados','grados.id','=','asignacions.grados_id')
             ->join('materias','materias.id','=','asignacions.materias_id')
             ->join('periodos','periodos.id','=','asignacions.periodos_id')
             ->select ('asignacions.id','periodos.nombre_periodo','grados.grado','grados.seccion','grados.categoria')
             ->distinct('grados.grado','periodos.nombre_periodo')
             ->get()->toArray();
              //dd($asignaciones);

             $Trimestres=DB::table('asignacions')
             ->join('grados','grados.id','=','asignacions.grados_id')
             ->join('materias','materias.id','=','asignacions.materias_id')
             ->join('periodos','periodos.id','=','asignacions.periodos_id')
             ->select ('periodos.nombre_periodo','grados.grado')
             ->distinct('grados.grado','periodos.nombre_periodo')
             ->get()->toArray();
            //dd($Trimestres);

            $materias = array();
            for($i=0;$i<count($Trimestres);$i++){
                $materias[$i]= $this->buscarMateriasPorGradoPeriodo($Trimestres[$i]->grado,$Trimestres[$i]->nombre_periodo);
             }
             //dd($materias);
             $page_data=array();
             for($l=0;$l<count($materias);$l++){
                 $cad='';
                 $concatenado='';
                 $nombre_periodo="";
                 $grado="";
                for($j=0;$j<count($materias[$l]);$j++){
                    $cad=$materias[$l][$j]->nombre;
                    $concatenado.='|'.$cad;
                    $nombre_periodo=$materias[$l][$j]->nombre_periodo;
                    $grado=$materias[$l][$j]->grado;
                }//fin del for interno
                $page_data[$l]=array(
                    'nombre_periodo'=>$nombre_periodo,
                    'grado'=>$grado,
                    'materias'=>$concatenado,
                );
             }//fin del for principal
             //dd($page_data);
              //dd($page_data[0]['materias']);
           return view('asignaciones.index', ['asignaciones' => $asignaciones,'page_data'=>$page_data]);
          }
    }//fin de index

    public function buscarMateriasPorGradoPeriodo($gradoTxt,$periodoTxt){
        //capturar el grado y el periodo para hacer la busqueda de los grados y
        //mandar el array para pintar los select
        //los datos enviados por post son del tipo string, hay que buscar primero que id tienen
        $gradoId=Grado::where('grado',$gradoTxt)->select('id')->get()->toArray();
        $periodoId=Periodo::where('nombre_periodo',$periodoTxt)->select('id')->get()->toArray();
        $match=['grados.id'=>$gradoId,'periodos.id'=>$periodoId];
        $mats=DB::table('asignacions')
        ->join('grados','grados.id','=','asignacions.grados_id')
        ->join('periodos','periodos.id','=','asignacions.periodos_id')
        ->join('materias','materias.id','=','asignacions.materias_id')
        ->where($match)
        ->select('materias.nombre','periodos.nombre_periodo','grados.grado')
        //->orderBy('grados.id')
        ->get()->toArray();
        //dd($mats);
        return $mats;
        //dd($periodoId);
        //dd($gradoId);
        //$match=['grados_id'=>$gradoId,'periodos_id'=>$periodoId];
        //$materias=Asignacion::where($match)->select('materias_id')->get()->toArray();
        //dd($mats);
        //buscar las materias y recuperar su nombre
        //$materiasTxt=array();
        /* for($i=0;i<count($materias);$i++){

        } */
    }//fin del servicui de busqueda de materias por periodo



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {

        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();
        if ($request)
        {
         $query=trim($request->get('buscarpor'));
            $grados= Grado::where('categoria', 'LIKE', '%' . $query . '%')
           ->get();
           return view('asignaciones.create', ['grados' => $grados,'materias' => $materias,'periodos' => $periodos, 'buscarpor' => $query]);
         }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $idGrado=$request->grados_id;
        $periodos=$request->periodo;
        $materias=$request->materia;


        for($i=0;$i<count($materias);$i++){
            for($n=0;$n<count($periodos);$n++){
                //$nuevaAsignacion=new Asignacion;
                //$nuevaAsignacion->grados_id=$idGrado;
                //$nuevaAsignacion->materias_id=(int)$materias[$i];
                //$nuevaAsignacion->periodos_id=(int)$periodos[$n];
                $nuevaAsignacion=Asignacion::create(['grados_id'=>$idGrado,
                                                    'materias_id'=>$materias[$i],
                                                    'periodos_id'=>$periodos[$n],
                                                    ]);
                //dd($nuevaAsignacion->periodos_id);
                //$nuevaAsignacion->save;
                $nuevaAsignacion->save();
            }
        }

        //dd($nuevaAsignacion);
        //dd($periodos);
        //dd($arregloPeriodosconComa);
        /* $loop = $request->get('periodo');
        $loop2 = $request->get('materia');
     foreach ($loop as $value){
         $resortfacility = new Asignacion;
         $resortfacility->grados_id = $request->get('grados_id');
         $resortfacility->periodos_id = $value;
         $resortfacility->save();
     }


     foreach ($loop2 as $value){
         $resortfacility = new Asignacion;
         $resortfacility->grados_id = $request->get('grados_id');
         $resortfacility->materias_id = $value;
         $resortfacility->save();
     } */

         Session::flash('success_message', 'asignacione guardado con éxito');
         //return redirect()->route('asignaciones.index', compact('asignaciones','grados'));
         return redirect()->route('asignaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignaciones=DB::table('asignacions')
        ->join('grados','grados.id','=','asignacions.grados_id')
        ->join('materias','materias.id','=','asignacions.materias_id')
        ->join('periodos','periodos.id','=','asignacions.periodos_id')
        ->select ('asignacions.id','periodos.nombre_periodo','grados.grado','grados.seccion','grados.categoria')

        ->get()->toArray();
        return view('asignaciones.show', compact('asignaciones','grados','materias','periodos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $asignaciones=Asignacion::findOrFail($id);
        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();
        return view('asignaciones.edit',compact('asignaciones','grados','materias','periodos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $asignaciones=Asignacion::findOrFail($id);
        $asignaciones->fill($request->all())->save();


        $asignaciones->update($request->all());

        Session::flash('info_message', 'asignacione actualizado con éxito');
        return redirect()->route('asignaciones.index',compact('asignaciones'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

       // $asignacione=asignacione::findOrFail($id);
         //Asignacion::destroy($id);
         //el id q recibe se trata solo de la asignacion de la materia a un grado a un periodo
         //entonces hay que buscar las materias por grado y periodo para eliminar
         //$GradoMateria=DB::table('asignacions')
         $GradoMateria=Asignacion::where('id',$id)->select('grados_id','periodos_id')->get()->toArray();
         //dd($GradoMateria[0]['grados_id']);
         //dd($GradoMateria[0]);
         $match=['grados_id'=>$GradoMateria[0]['grados_id'],'periodos_id'=>$GradoMateria[0]['periodos_id']];
         Asignacion::where($match)->delete();

        Session::flash('danger_message', 'asignaciones eliminadas correctamente');
        return back();
    }
}

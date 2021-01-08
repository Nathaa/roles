<?php

namespace App\Http\Controllers;

use App\Asignacion;
use App\Docente;
use App\Anio;
use App\Grado;
use App\DocenteGrado;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;



class DocenteGradoController extends Controller
{
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


        $docentegrados=DocenteGrado::paginate();

        if ($request)
        {
            $docentegrados=DB::table('docente_grados')
             ->join('asignacions','asignacions.id','=','docente_grados.asignacions_id','left')
             ->join('grados','grados.id','=','asignacions.grados_id','left')
             ->join('docentes','docentes.id','=','docente_grados.docentes_id','left')
             ->join('anios','anios.id','=','docente_grados.anios_id','left')
             ->select ('docente_grados.id','docentes.nombre','grados.grado','grados.seccion','anios.año')

             ->get()->toArray();

             return view('docentegrados.index', ['docentegrados' => $docentegrados]);


        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $docentes = Docente::get();
        $anios = Anio::get();

        $asignaciones=DB::table('asignacions')

        ->join('grados','grados.id','=','asignacions.grados_id','left')
        ->select('asignacions.id','grados.grado','grados.seccion')
        ->distinct('grados.grado')
        ->get()->toArray();

        return view('docentegrados.create', ['asignaciones' => $asignaciones],compact('docentes','anios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $docentegrados = DocenteGrado::create($request->all());

        $docentegrados->save();

        Session::flash('success_message', 'Asignacion guardada con éxito');
        return redirect()->route('docentegrados.index', compact('docentegrados'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $docentegrado=DocenteGrado::findOrFail($id);
        $docente = Docente::findOrFail($docentegrado->docentes_id);
        $anio = Anio::findOrFail($docentegrado->anios_id);
        $asignacion = Asignacion::findOrFail($docentegrado->asignacions_id);
        $grado = Grado::findOrFail($asignacion->grados_id);
        return view('docentegrados.show', compact('docentegrado','docente','anio','asignacion', 'grado'));
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

        $docentegrado=DocenteGrado::findOrFail($id);
        $anios = Anio::get();
        $docentes = Docente::get();

        $grados = Grado::get();
        $asignaciones=DB::table('asignacions')

        ->join('grados','grados.id','=','asignacions.grados_id','left')
        ->select('asignacions.id','grados.grado','grados.seccion')
        ->distinct('grados.grado')
        ->get()->toArray();

        //agregado para mostrar los valores ya seleccionados en los select
        $doc=Docente::where('id',$docentegrado->docentes_id)->select('nombre')->get()->toArray();
        $docenteActual=$doc[0]['nombre'];
        //dd($docenteActual);
        $ani=Anio::where('id',$docentegrado->anios_id)->select('año')->get()->toArray();
        $anioActual=$ani[0]['año'];
        $flag=TRUE;
        $asignacionId=DocenteGrado::where('id',$id)->select('asignacions_id')->get()->toArray();//buscando el id de la asignacion
        //dd($asignacionId);
        $gradoId=Asignacion::where('id',$asignacionId)->select('grados_id')->get()->toArray();//se vusca la asignacion con su id
        //dd($gradoId);
        $gradoSeccion=Grado::where('id',$gradoId)->select('grado','seccion')->get()->toArray();//se busca el grado con su id
        //dd($gradoSeccion);
        $gradoMasSeccion=$gradoSeccion[0]['grado'].$gradoSeccion[0]['seccion'];//concatenando el grado mas la seccion
        //dd($gradoMasSeccion);
        //


        //return view('docentegrados.create', ['asignaciones' => $asignaciones],compact('docentes','anios'));//lo cambiare por docentegrados.edit
        return view('docentegrados.edit', compact('docentegrado','anios','docentes','asignaciones','grados','anioActual','flag','docenteActual','gradoMasSeccion'));
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

        $docentegrado=DocenteGrado::findOrFail($id);
        $docentegrado->fill($request->all())->save();


        //$docente->update($request->all());
        //$docente->turnos()->sync($request->get('turnos'));

        Session::flash('info_message', 'Asignacion actualizada con éxito');
        return redirect()->route('docentegrados.index',compact('docentegrado'));
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

       // $docente=Docente::findOrFail($id);
         DocenteGrado::destroy($id);

         Session::flash('danger_message', 'Asignacion eliminada correctamente');
        return back();
    }
}

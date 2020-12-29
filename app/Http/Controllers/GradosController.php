<?php

namespace App\Http\Controllers;

use App\Anio;
use App\Grado;
use App\Turno;
use App\Http\Requests\GradosStoreRequest;
use App\Http\Requests\GradosUpdateRequest;
use App\PlanEstudio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class GradosController extends Controller
{
    public function __construct() //es para que funcione el verificador de logeado como admin
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
        $grados=Grado::paginate();
        
        if ($request)
       {
        $query=trim($request->get('search'));
        //$grados= Grado::where('cod_grado', 'LIKE', '%' . $query . '%')
           $grados= Grado::where('id', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->paginate(5);
          return view('grados.index', ['grados' => $grados, 'search' => $query]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turnos = Turno::get();

        $planesEstudio = PlanEstudio::get();
        $anios = Anio::get();
        
        return view('grados.create', compact('turnos','planesEstudio','anios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradosStoreRequest $request)
    {
        //dd($request->all());
        $grados = Grado::create($request->all());
        $grados->save();

        Session::flash('success_message', 'Grado guardado con éxito');
        return redirect()->route('grados.index', compact('grados'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grado=Grado::findOrFail($id);
        $turnos = Turno::get();

        $planesEstudio = PlanEstudio::get();
        $anios = Anio::get();
        return view('grados.show', compact('grado','turnos','planesEstudio','anios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $grado=Grado::findOrFail($id);
        //dd($grado);
        $turnos = Turno::get();
        $planesEstudio = PlanEstudio::get();
        $anios = Anio::get();
        //dd($grado);
        $flag=TRUE;
        $anioOriginal=$grado->anios_id;
        $planOriginal=$grado->plan_estudios_id;
        $turnoOriginal=$grado->turnos_id;
        $categoriaOriginal=$grado->categoria;
        //return view('grados.edit', compact('grado','turnos','planesEstudio','anios'));//original
        return view('grados.edit', compact('grado','turnos','planesEstudio','anios','anioOriginal','flag','planOriginal','turnoOriginal','categoriaOriginal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradosUpdateRequest $request,$id)
    {
        $grado=Grado::findOrFail($id);
        //dd($grado);

        $grado->fill($request->all())->save();

        //$gradoActualizado = Grado::findOrFail($id);
        //$gradoActualizado->grado = $request->grado;
        //$gradoActualizado->seccion = $request->seccion;
        //$gradoActualizado->categoria = $request->categoria;
        //$gradoActualizado->save();
        //$gradoActualizado->update();



        //return redirect('/grados')->with('info', 'datos de grado guardados con exito');
        Session::flash('info_message', 'Grado actualizado con éxito');
        return redirect()->route('grados.index');
        //return back()->with('mensaje','Grado editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grado::destroy($id);

        Session::flash('danger_message', 'Grado eliminado correctamente');
        return back();
    }
}

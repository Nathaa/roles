<?php

namespace App\Http\Controllers;

use App\Asignacion;
use App\Docente;
use App\Anio;
use App\DocenteGrado;
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
        $query=trim($request->get('search'));
           $docentegrados= DocenteGrado::where('id', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->paginate(5);
          return view('docentegrados.index', ['docentegrados' => $docentegrados, 'search' => $query]);
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
       
        $asignaciones = Asignacion::get();
        $docentes = Docente::get();
        $anios = Anio::get();

        return view('docentegrados.create', compact('asignaciones','docentes','anios'));
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
        return view('docentegrados.show', compact('docentegrado','docente','anio','asignacion'));
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
        $asignaciones = Asignacion::get();
        return view('docentegrados.edit', compact('docentegrado','anios','docentes','asignaciones'));
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

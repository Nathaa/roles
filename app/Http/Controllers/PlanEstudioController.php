<?php

namespace App\Http\Controllers;
use App\PlanEstudio;

use App\Http\Requests\PlanEstudiosStoreRequest;
use App\Http\Requests\PlanEstudiosUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;


class PlanEstudioController extends Controller
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
        $planesEstudio=PlanEstudio::paginate();
        //dd($planesEstudio);


        if ($request)
       {
        $query=trim($request->get('search'));
        //$grados= Grado::where('cod_grado', 'LIKE', '%' . $query . '%')
           $planesEstudio= PlanEstudio::where('id', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->paginate(5);
          return view('planesEstudio.index', ['planesEstudio' => $planesEstudio, 'search' => $query]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('planesEstudio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanEstudiosStoreRequest $request)
    {
        //dd($request->all());
        $planesEstudio = PlanEstudio::create($request->all());
        $planesEstudio->save();

        Session::flash('success_message', 'Plan de Estudio guardado con éxito');
        return redirect()->route('planesEstudio.index', compact('planesEstudio'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planesEstudio=PlanEstudio::findOrFail($id);
        return view('planesEstudio.show', compact('planesEstudio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $planEstudio=PlanEstudio::findOrFail($id);
        //dd($grado);
        return view('planesEstudio.edit', compact('planEstudio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanEstudiosUpdateRequest $request,$id)
    {
        $planEstudio=PlanEstudio::findOrFail($id);
        //dd($grado);

        $planEstudio->fill($request->all())->save();

        //$gradoActualizado = Grado::findOrFail($id);
        //$gradoActualizado->grado = $request->grado;
        //$gradoActualizado->seccion = $request->seccion;
        //$gradoActualizado->categoria = $request->categoria;
        //$gradoActualizado->save();
        //$gradoActualizado->update();



        //return redirect('/grados')->with('info', 'datos de grado guardados con exito');
        Session::flash('info_message', 'Plan de Estudio actualizado con éxito');
        return redirect()->route('planesEstudio.index');
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
        PlanEstudio::destroy($id);

        Session::flash('danger_message', 'Plan de Estudio eliminado correctamente'); 
        return back();
    }
}

<?php

namespace App\Http\Controllers;
use App\Asignacion;
use Session;
use App\Grado;
use App\Materia;
use App\Periodo;
use CreateAsignacionsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
      //$asignaciones= asignacione::all();
        //return view('asignaciones.index', ['asignaciones' => $asignaciones]);

        $asignaciones=Asignacion::paginate();

        $grados=Grado::paginate();
        $grados = Grado::get();

        return view('asignaciones.index', compact('grados','asignaciones'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();

        return view('asignaciones.create', compact('grados','materias','periodos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $asignaciones = Asignacion::create($request->all());

       // dd($request);

       $materias_id=$request->materias;
       foreach($materias_id as $id)
       $id= new Asignacion();
       $id->materias_id=$id;
       $id->save();


     //$asignaciones->materias()->attach($request->get('materias'));
        //$asignaciones->periodo()->attach($request->get('periodos_id'));

        $asignaciones->save();

        Session::flash('success_message', 'asignacione guardado con éxito');
        return redirect()->route('asignaciones.index', $asignaciones->id);
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
        $asignaciones=Asignacion::findOrFail($id);
        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();
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
         Asignacion::destroy($id);

        Session::flash('danger_message', 'asignacione eliminado correctamente');
        return back();
    }
}

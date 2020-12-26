<?php

namespace App\Http\Controllers;
use App\Materia;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\MateriaFormRequest;
use Session;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if($request){

            $query = trim($request->get('search'));
            $materias=DB::table('materias')->where('nombre','LIKE','%'.$query.'%')
            #->where ('estado','=','1')
            ->orderBy('id','desc')
            ->paginate(5);
            return view("materias.index", ["materias"=>$materias, "search"=>$query]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('materias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriaFormRequest $request)
    {
        $materia = new Materia();
        $materia->nombre = $request->input('nombre');
        $materia->descripcion = $request->input('descripcion');
        $materia->estado = '1';
        $materia->save();
        Session::flash('success_message', 'Materia guardada con éxito');
        return redirect('materias');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materia=materia::findOrFail($id);
        return view('materias.show', compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $materia=materia::findOrFail($id);
        return view('materias.edit',compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $materia=materia::findOrFail($id);
        //$materia->fill($request->all())->save();
        $materia->nombre = $request->input('nombre');
        $materia->descripcion = $request->input('descripcion');
        $materia->estado = $request->input('estado');
        //$request->all()
        $materia->update();

        Session::flash('info_message', 'Materia actualizada con éxito');
        return redirect()->route('materias.index',compact('materia'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        materia::destroy($id);

        Session::flash('danger_message', 'Materia eliminada correctamente');
        return back();
    }

    /*public function cant_materias(MateriaFormRequest $request){
        
        if($request->ajax()){
            $nombre = $request->get('nombre');
            $nombre_materia = Materia::where('nombre', 'like', '%'.strtoupper($nombre). '%');
            return response()->json(['nombre_materia' => $nombre_materia]);
        }
        
        //$list_materias = DB::table('materias')->get();
        //$materias = Materia::all();
        //return view('materias.modal',compact('list_materias'));
    }*/
}

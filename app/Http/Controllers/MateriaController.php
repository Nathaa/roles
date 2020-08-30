<?php

namespace App\Http\Controllers;
use App\Materia;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\MateriaFormRequest;

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
            ->paginate(7);
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
        if($materia->save()){
            return back()->with('notificacion', "Materia registrada exitosamente"); 
        }
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
        return view("materias.show",["materia"=>Materia::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $materia = Materia::find($id);
        return view('materias.edit')->with('materia', $materia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(MateriaFormRequest $request, $id)
    {
        $materia=Materia::findOrFail($id);
        $materia->nombre = $request->input('nombre');
        $materia->descripcion = $request->input('descripcion');
        $materia->estado = $request->input('estado');
        $materia->update();
        return back()->with('notificacion', "Materia modifacada exitosamente"); 
        return redirect('materias');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materia=Materia::findOrFail($id);
        $materia->estado='0';
        $materia->update();
        return redirect('materias');
    }

}

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
    public function update(MateriaFormRequest $request, $id)
    {
        $materia=materia::findOrFail($id);
        $materia->fill($request->all())->save();


        $materia->update($request->all());

        return redirect()->route('materias.index',compact('materia'))
        ->with('info', 'materia guardado con exito');
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

        return back()->with('info', 'Eliminado correctamente');
    }

}

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
        if($materia->save()){
            Session::flash('success_message', 'Materia guardada con éxito');
            return back();
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
        //dd($materia);
        $flag=TRUE;
        $estadoOriginal=$materia->estado;
        //dd($estadoOriginal);
        //return view('materias.edit',compact('materia'));
        return view('materias.edit',compact('materia','estadoOriginal','flag'));
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

}

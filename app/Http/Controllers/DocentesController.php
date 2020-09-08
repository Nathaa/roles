<?php

namespace App\Http\Controllers;

use App\Docente;
use App\Http\Requests\DocentesStoreRequest;
use App\Http\Requests\DocentesUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;




class DocentesController extends Controller
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
      //$docentes= Docente::all();
        //return view('docentes.index', ['docentes' => $docentes]);

        $docentes=Docente::paginate();

        if ($request)
       {
        $query=trim($request->get('search'));
           $docentes= Docente::where('nombre', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->get();
          return view('docentes.index', ['docentes' => $docentes, 'search' => $query]);
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
        $arraySexo = array('M', 'F');
        return view('docentes.create', compact('arraySexo'));
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

        $docentes = docente::create($request->all());

        $docentes->save();

        return redirect()->route('docentes.index', compact('docentes'))
        ->with('info', 'Docente guardado con exito');
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
        $docente=Docente::findOrFail($id);
        return view('docentes.show', compact('docente'));
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
        $arraySexo = array('M', 'F');
        $docente=Docente::findOrFail($id);
        return view('docentes.edit', compact('docente','arraySexo'));
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

        $docente=docente::findOrFail($id);
        $docente->fill($request->all())->save();


        $docente->update($request->all());

        return redirect()->route('docentes.index',compact('docente'))
        ->with('info', 'Docentes guardado con exito');
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
         Docente::destroy($id);

        return back()->with('info', 'Eliminado correctamente');
    }
}

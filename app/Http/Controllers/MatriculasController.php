<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;

class MatriculasController extends Controller
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
        //
        $matriculas=Matricula::paginate();

        if ($request)
       {
        $query=trim($request->get('search'));
           $matriculas= Matricula::where('nombre', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->get();
          return view('matriculas.index', ['matriculas' => $matriculas, 'search' => $query]);
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
        return view('matriculas.create');
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
        $matriculas = matricula::create($request->all());

        $matriculas->save();

        return redirect()->route('matriculas.index', compact('matriculas'))
        ->with('info', 'Matrícula guardada con éxito');
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
        $matricula=matricula::findOrFail($id);
        return view('matriculas.show', compact('matricula'));
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
        $matricula=matricula::findOrFail($id);
        return view('matriculas.edit',compact('matricula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $matricula=matricula::findOrFail($id);
        $matricula->fill($request->all())->save();


        $matricula->update($request->all());

        return redirect()->route('matriculas.index',compact('matricula'))
        ->with('info', 'Matrícula guardado con éxito');
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
        matricula::destroy($id);

        return back()->with('info', 'Eliminada correctamente');
    }
}
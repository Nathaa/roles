<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anio;
use Session;

class AniosController extends Controller
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
      //$anios= anio::all();
        //return view('anios.index', ['anios' => $anios]);

        $anios=Anio::paginate();

        if ($request)
       {
        $query=trim($request->get('search'));
           $anios= Anio::where('nombre', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->paginate(5);
          return view('anios.index', ['anios' => $anios, 'search' => $query]);
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

        return view('anios.create');
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

        $anios = anio::create($request->all());

        $anios->save();
        
        Session::flash('success_message', 'Año guardado con éxito');
        return redirect()->route('anios.index', compact('anios'));
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
        $anio=anio::findOrFail($id);
        return view('anios.show', compact('anio'));
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

        $anio=anio::findOrFail($id);
        return view('anios.edit',compact('anio'));
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

        $anio=anio::findOrFail($id);
        $anio->fill($request->all())->save();


        $anio->update($request->all());

        Session::flash('info_message', 'Año actualizado con éxito');
        return redirect()->route('anios.index',compact('anio'));
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

       // $anio=anio::findOrFail($id);
         anio::destroy($id);

        Session::flash('danger_message', 'Año eliminado correctamente'); 
        return back();
    }
}

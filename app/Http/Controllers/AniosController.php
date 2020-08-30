<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anio;
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
          ->get();
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

        return redirect()->route('anios.index', compact('anios'))
        ->with('info', 'Año guardado con exito');
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

        return redirect()->route('anios.index',compact('anio'))
        ->with('info', 'Año guardado con exito');
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

        return back()->with('info', 'Eliminado correctamente');
    }
}

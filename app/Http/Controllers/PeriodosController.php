<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodo;
use Session;

class PeriodosController extends Controller
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
      //$periodos= periodo::all();
        //return view('periodos.index', ['periodos' => $periodos]);

        $periodos=Periodo::paginate();

        if ($request)
       {
        $query=trim($request->get('search'));
           $periodos= Periodo::where('nombre_periodo', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->paginate(5);
          return view('periodos.index', ['periodos' => $periodos, 'search' => $query]);
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


        return view('periodos.create');
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

        $periodos = periodo::create($request->all());

        $periodos->save();

        Session::flash('success_message', 'Periodo guardado con éxito');
        return redirect()->route('periodos.index', compact('periodos'));
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
        $periodo=periodo::findOrFail($id);
        return view('periodos.show', compact('periodo'));
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

        $periodo=periodo::findOrFail($id);
        return view('periodos.edit',compact('periodo'));
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

        $periodo=periodo::findOrFail($id);
        $periodo->fill($request->all())->save();


        $periodo->update($request->all());

        Session::flash('info_message', 'Periodo actualizado con éxito');
        return redirect()->route('periodos.index',compact('periodo'));
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

       // $periodo=periodo::findOrFail($id);
         periodo::destroy($id);

        Session::flash('danger_message', 'Periodo eliminado correctamente');
        return back();
    }
}

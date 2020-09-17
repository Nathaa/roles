<?php

namespace App\Http\Controllers;

use App\Grado;
use App\Materia;
use App\Periodo;
use Illuminate\Http\Request;
use App\Plan_Academico;
use Session;

class Plan_Academicos extends Controller
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
      //$Plan_Academicos= Plan_Academico::all();
        //return view('Plan_Academicos.index', ['Plan_Academicos' => $Plan_Academicos]);

        $plan_academicos=Plan_Academico::paginate();

        if ($request)
       {
        $query=trim($request->get('search'));
           $plan_academicos= Plan_Academico::where('nombre', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->get();
          return view('plan_academicos.index', ['plan_academicos' => $plan_academicos, 'search' => $query]);
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
        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();

        return view('plan_academicos.create', compact('grados','materias','periodos'));
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

        $plan_academicos = Plan_Academico::create($request->all());

        $plan_academicos->save();

        Session::flash('success_message', 'Plan_Academico guardado con éxito');
        return redirect()->route('plan_academicos.index', compact('plan_academicos'));
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
        $plan_academico=Plan_Academico::findOrFail($id);
        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();
        return view('plan_academicos.show', compact('plan_academico','grados','materias','periodos'));
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

        $plan_academico=Plan_Academico::findOrFail($id);
        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();
        return view('plan_academicos.edit',compact('plan_academico','grados','materias','periodos'));
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

        $plan_academico=Plan_Academico::findOrFail($id);
        $plan_academico->fill($request->all())->save();


        $plan_academico->update($request->all());

        Session::flash('info_message', 'Plan_Academico actualizado con éxito');
        return redirect()->route('plan_academicos.index',compact('plan_academico'));
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

       // $Plan_Academico=Plan_Academico::findOrFail($id);
         plan_academico::destroy($id);

        Session::flash('danger_message', 'Plan_Academico eliminado correctamente');
        return back();
    }
}

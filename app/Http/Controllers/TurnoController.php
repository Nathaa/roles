<?php

namespace App\Http\Controllers;
use App\Turno;
use Illuminate\Http\Request;
use App\Http\Requests\TurnoFormRequest;
use Session;

class TurnoController extends Controller
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
        $turnos=Turno::paginate();

        if ($request)
       {
        $query=trim($request->get('search'));
        $turnos= Turno::where('nombre_turno', 'LIKE', '%' . $query . '%')
        ->orderBy('id','asc')
        ->paginate(5);
        return view('turnos.index', ['turnos' => $turnos, 'search' => $query]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayTurno = array('Matutino', 'Vespertino', 'Completo');
        return view('turnos.create', compact('arrayTurno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turnos = Turno::create($request->all());

        $turnos->save();

        Session::flash('success_message', 'Turno guardado con éxito');
        return redirect()->route('turnos.index', compact('turnos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turno=Turno::findOrFail($id);
        return view('turnos.show', compact('turno'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arrayTurno = array('Matutino', 'Vespertino', 'Completo');
        $turno=Turno::findOrFail($id);
        //dd($turno);
        $flag=TRUE;
        $turnoOriginal=$turno->nombre_turno;
        //return view('turnos.edit',compact('turno', 'arrayTurno'));//original
        return view('turnos.edit',compact('turno', 'arrayTurno','flag','turnoOriginal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $turno=Turno::findOrFail($id);
        $turno->fill($request->all())->save();


        $turno->update($request->all());

        Session::flash('info_message', 'Turno actualizado con éxito');
        return redirect()->route('turnos.index',compact('turno'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Turno::destroy($id);

        Session::flash('danger_message', 'Turno eliminado correctamente');
        return back();
    }
}

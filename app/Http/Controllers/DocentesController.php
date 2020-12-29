<?php

namespace App\Http\Controllers;

use App\Turno;
use App\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;



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
          ->paginate(5);
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
        $turnos = Turno::get();

        return view('docentes.create', compact('arraySexo','turnos'));
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
        $docentes = Docente::create($request->all());
        if ($request->hasfile('imagen')) {
            $path=Storage::disk('public')->put('imagenes', $request->file('imagen'));
            $docentes->fill(['imagen' => asset($path)])->save();
            //$docentes['imagen']=$request->file('imagen')->store('uploads','public');
            //$docentes->imagen= $file->getClientOriginalName();
            //$file->move(public_path().'/imagenes/', $file->getClientOriginalName());

        }
       

      //  $docentes->turnos()->sync($request->get('turnos'));

        $docentes->save();

        Session::flash('success_message', 'Docente guardado con éxito');
        return redirect()->route('docentes.index', compact('docentes'));
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
        $turno = Turno::findOrFail($docente->turnos_id);
        return view('docentes.show', compact('docente','turno'));
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
        $turnos = Turno::get();
        //editado para recuperar el valor seleccionado y mandarlo
        $flag=TRUE;
        $turnoOriginal=$docente->turnos_id;
        //return view('docentes.edit', compact('docente','arraySexo','turnos')); //original
        return view('docentes.edit', compact('docente','arraySexo','turnos','flag','turnoOriginal'));
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

        $docente=Docente::findOrFail($id);
        $docente->fill($request->all())->save();
        if ($request->hasfile('imagen')) {

            $path=Storage::disk('public')->put('imagenes', $request->file('imagen'));
            $docente->fill(['imagen' => asset($path)])->save();


        }

        //$docente->update($request->all());
        //$docente->turnos()->sync($request->get('turnos'));

        Session::flash('info_message', 'Docente actualizado con éxito');
        return redirect()->route('docentes.index',compact('docente'));
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

         Session::flash('danger_message', 'Docente eliminado correctamente');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Http\Requests\EstudiantesStoreRequest;
use App\Http\Requests\EstudiantesUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;



class EstudiantesController extends Controller
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
      //$estudiantes= Estudiante::all();
        //return view('estudiantes.index', ['estudiantes' => $estudiantes]);

        $estudiantes=Estudiante::paginate();

        if ($request)
       {
        $query=trim($request->get('search'));
           $estudiantes= Estudiante::where('nombre', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->paginate(5);
          return view('estudiantes.index', ['estudiantes' => $estudiantes, 'search' => $query]);
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
        $arrayPadecimiento = array('Si', 'No');
        return view('estudiantes.create', compact('arrayPadecimiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudiantesStoreRequest $request)
    {
        //

        $estudiantes = Estudiante::create($request->all());

        if ($request->hasfile('imagen')) {
            $path=Storage::disk('public')->put('imagenes', $request->file('imagen'));
            $estudiantes->fill(['imagen' => asset($path)])->save();
            //$estudiantes['imagen']=$request->file('imagen')->store('uploads','public');
            //$estudiantes->imagen= $file->getClientOriginalName();
            //$file->move(public_path().'/imagenes/', $file->getClientOriginalName());

        }
        $estudiantes->save();

        Session::flash('success_message', 'Estudiante guardada con éxito');
        return redirect()->route('estudiantes.index', compact('estudiantes'));
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
        $estudiante=Estudiante::findOrFail($id);
        return view('estudiantes.show', compact('estudiante'));
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
        $arrayPadecimiento = array('Si', 'No');
        $estudiante=Estudiante::findOrFail($id);
        $flag=TRUE;
        $padecimiento=$estudiante->padecimientos;
        //return view('estudiantes.edit', compact('estudiante','arrayPadecimiento'));
        return view('estudiantes.edit', compact('estudiante','arrayPadecimiento','flag','padecimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstudiantesUpdateRequest $request,$id)
    {
        //if ($request->hasfile('imagen')) {

          //  $file= $request->file('imagen');
            //$estudiante->imagen= $file->getClientOriginalName();
            //$file->move(public_path().'/imagenes/', $file->getClientOriginalName());
        //}
        $estudiante=Estudiante::findOrFail($id);
        $estudiante->fill($request->all())->save();

        if ($request->hasfile('imagen')) {

            $path=Storage::disk('public')->put('imagenes', $request->file('imagen'));
            $estudiante->fill(['imagen' => asset($path)])->save();


        }

    //  $estudiante->update($request->all());
        Session::flash('info_message', 'Estudiante actualizada con éxito');
        return redirect()->route('estudiantes.index',compact('estudiante'));
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

       // $estudiante=Estudiante::findOrFail($id);
         Estudiante::destroy($id);

         Session::flash('danger_message', 'Estudiante eliminada correctamente'); 
        return back();
    }
}

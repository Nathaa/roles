<?php

namespace App\Http\Controllers;
use App\estudiante;

use App\Reporte;
use Illuminate\Http\Request;

class estudiantes extends Controller
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
      //$estudiantes= estudiante::all();
        //return view('estudiantes.index', ['estudiantes' => $estudiantes]);

      //  $estudiantes=estudiante::paginate();

        if ($request)
       {
        $query=trim($request->get('search'));
           $estudiantes= estudiante::where('nombre', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->paginate(5);
          return view('reportes.index', ['estudiantes' => $estudiantes, 'search' => $query]);
        }

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

        return view('estudiantes.show');
    }

}

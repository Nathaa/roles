<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Asignacion;
use Session;
use App\Grado;
use App\Materia;
use App\Periodo;
use DB;
use Illuminate\Support\Arr;


class AsignacionController extends Controller
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
        {
          //$asignaciones= asignacione::all();
            //return view('asignaciones.index', ['asignaciones' => $asignaciones]);

            /*$asignaciones=Asignacion::paginate();

            $grados=Grado::paginate();
            $grados = Grado::get();

            return view('asignaciones.index', compact('grados','asignaciones'));*/

            if ($request)
            {
                $asignaciones=DB::select ('select distinct
                                           concat(b.grado,b.seccion) grado,categoria,
                                           cursor_loop(a.grados_id) as materias,
                                           cursor_loop2(a.grados_id) as periodos
                                    from asignacions a
                                    left join grados b on(a.grados_id=b.id)');




               return view('asignaciones.index', ['asignaciones' => $asignaciones]);

              }

        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {

        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();
        if ($request)
        {
         $query=trim($request->get('buscarpor'));
            $grados= Grado::where('categoria', 'LIKE', '%' . $query . '%')
           ->get();
           return view('asignaciones.create', ['grados' => $grados,'materias' => $materias,'periodos' => $periodos, 'buscarpor' => $query]);
         }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loop = $request->get('periodo');
        $loop2 = $request->get('materia');
     foreach ($loop as $value){
         $resortfacility = new Asignacion;
         $resortfacility->grados_id = $request->get('grados_id');
         $resortfacility->periodos_id = $value;
         $resortfacility->save();
     }


     foreach ($loop2 as $value){
         $resortfacility = new Asignacion;
         $resortfacility->grados_id = $request->get('grados_id');
         $resortfacility->materias_id = $value;
         $resortfacility->save();
     }

         Session::flash('success_message', 'asignacione guardado con éxito');
         return redirect()->route('asignaciones.index', compact('asignaciones','grados'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignaciones=Asignacion::findOrFail($id);
        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();
        return view('asignaciones.show', compact('asignaciones','grados','materias','periodos'));
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

        $asignaciones=Asignacion::findOrFail($id);
        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();
        return view('asignaciones.edit',compact('asignaciones','grados','materias','periodos'));
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

        $asignaciones=Asignacion::findOrFail($id);
        $asignaciones->fill($request->all())->save();


        $asignaciones->update($request->all());

        Session::flash('info_message', 'asignacione actualizado con éxito');
        return redirect()->route('asignaciones.index',compact('asignaciones'));
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

       // $asignacione=asignacione::findOrFail($id);
         Asignacion::destroy($id);

        Session::flash('danger_message', 'asignacione eliminado correctamente');
        return back();
    }
}

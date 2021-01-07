<?php

namespace App\Http\Controllers;
use App\Asignacion;
use Session;
use App\Grado;
use App\Materia;
use App\Periodo;
use CreateAsignacionsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
      //$asignaciones= asignacione::all();
        //return view('asignaciones.index', ['asignaciones' => $asignaciones]);

        /*$asignaciones=Asignacion::paginate();

        $grados=Grado::paginate();
        $grados = Grado::get();

        return view('asignaciones.index', compact('grados','asignaciones'));*/

		if ($request)
        {
            $asignaciones=DB::select ('select distinct
									   concat(b.grado,b.seccion) grado,
									   cursor_loop(a.grados_id) as materias,
									   cursor_loop2(a.grados_id) as periodos
								from asignacions a
                                left join grados b on(a.grados_id=b.id)');


            /* $asignaciones=DB::select ("select distinct t2.grado as grado,
             array_to_string(ARRAY_AGG(DISTINCT t2.materia), ',') materias,
             array_to_string(ARRAY_AGG(nombre_periodo), ',') periodos

       FROM (
           SELECT DISTINCT public.grados.id as grado_id, grado, public.periodos.id as periodo_id, array_to_string(ARRAY_AGG (nombre), ',') materia
           FROM public.asignacions
           INNER JOIN public.grados ON (public.grados.id = public.asignacions.grados_id)
           INNER JOIN public.materias ON (public.materias.id=public.asignacions.materias_id)
           INNER JOIN public.periodos ON (public.periodos.id=public.asignacions.periodos_id)
           GROUP BY
               grado_id, grado, periodo_id
           ORDER BY
               grado
       ) t2

       INNER JOIN public.periodos ON (public.periodos.id=t2.periodo_id)
       GROUP BY
           grado
       ORDER BY
           grado");*/


           return view('asignaciones.index', ['asignaciones' => $asignaciones]);

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

        return view('asignaciones.create', compact('grados','materias','periodos'));
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

	 //$periodos->save();

//foreach ($periodos as $periodo) {
   //$p = Asignacion::where('id', '=', $periodo)->firstOrFail(); //Get corresponding form permission in db

               // $periodo= new Asignacion();
      // $periodo->materias_id=$periodo;
	  // echo $periodo;
       //$periodo->save();

          //  }

	 //$asignaciones =  Asignacion::create($request->all());
     //$asignaciones->grado()->attach($request->get('grados'));
	 //$grados=$asignaciones->materia()->attach($request->get('materias'));
	 //$asignaciones->periodo()->attach($request->get('periodos'));


	 /*$grados = $asignaciones->grado()->attach($request->get('grados_id'));
	 $materias = $asignaciones->materia()->attach($request->get('materias_id'));
	 $periodos = $asignaciones->periodo()->attach($request->get('periodos_id'));*/


     /*foreach($grados as $grado) {
        Asignacion::create([
            'grados'=>$grado
        ]);
     }
	 */




       // dd($request);
      // $materias_id=$request->materias;
       //foreach($materias_id as $id)
       //$id= new Asignacion();
       //$id->materias_id=$id;
      // $id->save();
     //$asignaciones->materias()->attach($request->get('materias'));
        //$asignaciones->periodo()->attach($request->get('periodos_id'));

      //  $asignaciones->save();

        //Session::flash('success_message', 'asignacione guardado con éxito');
        //eturn redirect()->route('asignaciones.index', compact('asignaciones','grados'));
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
        /*$asignaciones=Asignacion::findOrFail($id);
        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();*/

        $asignaciones=DB::select("select periodos_id
        FROM asignacions A
        LEFT JOIN PERIODOS B ON(B.ID=A.PERIODOS_ID)
        WHERE a.GRADOS_ID in (select id from grados where concat(grado,seccion)='".$id."')
          and a.periodos_id is not null");

        $asignaciones2=DB::select("select materias_id
        FROM asignacions A
        LEFT JOIN materias B ON(B.ID=A.materias_ID)
        WHERE a.GRADOS_ID in (select id from grados where concat(grado,seccion)='".$id."')
          and a.materias_ID is not null");

        $grad=DB::select("select distinct grados_id
        FROM asignacions A
        LEFT JOIN grados B ON(B.ID=A.grados_id)
        WHERE a.GRADOS_ID in (select id from grados where concat(grado,seccion)='".$id."')
          and a.materias_ID is not null");

        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();

        return view('asignaciones.show', compact('grados','materias','periodos','asignaciones','asignaciones2','grad'));
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

        $asignaciones=DB::select("select periodos_id
        FROM asignacions A
        LEFT JOIN PERIODOS B ON(B.ID=A.PERIODOS_ID)
        WHERE a.GRADOS_ID in (select id from grados where concat(grado,seccion)='".$id."')
          and a.periodos_id is not null");
         //dd($asignaciones);
        $asignaciones2=DB::select("select materias_id
        FROM asignacions A
        LEFT JOIN materias B ON(B.ID=A.materias_ID)
        WHERE a.GRADOS_ID in (select id from grados where concat(grado,seccion)='".$id."')
          and a.materias_ID is not null");
          //dd($asignaciones2);
        $grad=DB::select("select distinct grados_id
        FROM asignacions A
        LEFT JOIN grados B ON(B.ID=A.grados_id)
        WHERE a.GRADOS_ID in (select id from grados where concat(grado,seccion)='".$id."')
          and a.materias_ID is not null");
          //dd($grad);
        foreach ($grad as $p){
            $x= $p->grados_id;
        }


        $grados = Grado::get();
        $materias = Materia::get();
        $periodos = Periodo::get();
        return view('asignaciones.edit',compact('x','grad','asignaciones','asignaciones2','grados','materias','periodos'));
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

        /*$asignaciones=Asignacion::findOrFail($id);
        $asignaciones->fill($request->all())->save();


        $asignaciones->update($request->all());*/

        DB::delete("delete from asignacions where grados_id =".$id);
        //DB::delete("delete from asignacions where grados_id in(select id from grados where concat(grado,seccion) ='".$id."' )");


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

        Session::flash('info_message', 'asignaciones actualizado con éxito');
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
         //Asignacion::where('id',$id)->delete();

         DB::delete("delete from asignacions where grados_id in(select id from grados where concat(grado,seccion) ='".$id."' )");

        Session::flash('danger_message', 'asignacione eliminado correctamente');
        return back();
    }
}

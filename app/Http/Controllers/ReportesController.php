<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Reporte;
use DB;
use PDF;
class ReportesController extends Controller
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
           $reportes= estudiante::where('nombre', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->paginate(5);
          return view('reportes.index', ['reportes' => $reportes, 'search' => $query]);
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

        //

        $datos=DB::select("select distinct concat(e.nombre,' ',e.apellido) nombre, concat(g.grado,' ',g.seccion) grado, p.nombre_periodo
                          from notas n
                          join estudiantes e on (n.estudiantes_id=e.id)
                          join grados g on (n.grados_id=g.id)
                          join periodos p on (n.periodos_id = p.id)
                          where estudiantes_id =".$id);

        $x=$id;

        $reportes=DB::select("select x.nombre,x.examen1,x.examen2,x.examen3,x.tarea1,x.tarea2,y.promedio,y.estado
        from(
        select *, (examen1+examen2+examen3+tarea1+tarea2) promedio, (case when (examen1+examen2+examen3+tarea1+tarea2) >=6 then 'Aprobado' else 'Reprobado' end) estado
                FROM   crosstab(
                   'select m.nombre nombre ,n.tipo_nota,n.valor_nota
                  from notas n
                  left join materias m on (m.id=n.materias_id)
                  where n.estudiantes_id=".$id."
                  order by m.nombre,n.tipo_nota asc'
                   ) AS ct (nombre character varying, examen1 numeric, examen2 numeric, examen3 numeric,tarea1 numeric,tarea2 numeric))x,
              (select *, (coalesce(examen1,0)+coalesce(examen2,0)+coalesce(examen3,0)+coalesce(tarea1,0)+coalesce(tarea2,0)) promedio, (case when (coalesce(examen1,0)+coalesce(examen2,0)+coalesce(examen3,0)+coalesce(tarea1,0)+coalesce(tarea2,0)) >=6 then 'Aprobado' else 'Reprobado' end) estado
                FROM   crosstab(
                   'select m.nombre nombre ,n.tipo_nota,round(n.valor_nota*ponderacion/100,2)
                  from notas n
                  left join materias m on (m.id=n.materias_id)
                  where n.estudiantes_id=".$id."
                  order by m.nombre,n.tipo_nota asc'
                   ) AS ct (nombre character varying, examen1 numeric, examen2 numeric, examen3 numeric,tarea1 numeric,tarea2 numeric))y
          where x.nombre=y.nombre");
        
        
        return view('reportes.show',  ['reportes' => $reportes],compact('datos','x'));


        /*view()->share('reportes',$reportes);
        if($id->has('download')){
            $pdf = PDF::loadView('show');
            return $pdf->download('show');
        }*/
        //return view('show');
    }


    public function imprimir($id){

      $datos=DB::select("select distinct concat(e.nombre,' ',e.apellido) nombre, concat(g.grado,' ',g.seccion) grado, p.nombre_periodo
                          from notas n
                          join estudiantes e on (n.estudiantes_id=e.id)
                          join grados g on (n.grados_id=g.id)
                          join periodos p on (n.periodos_id = p.id)
                          where estudiantes_id =".$id);

      $reportes=DB::select("select x.nombre,x.examen1,x.examen2,x.examen3,x.tarea1,x.tarea2,y.promedio,y.estado
      from(
      select *, (examen1+examen2+examen3+tarea1+tarea2) promedio, (case when (examen1+examen2+examen3+tarea1+tarea2) >=6 then 'Aprobado' else 'Reprobado' end) estado
              FROM   crosstab(
                 'select m.nombre nombre ,n.tipo_nota,n.valor_nota
                from notas n
                left join materias m on (m.id=n.materias_id)
                where n.estudiantes_id=".$id."
                order by m.nombre,n.tipo_nota asc'
                 ) AS ct (nombre character varying, examen1 numeric, examen2 numeric, examen3 numeric,tarea1 numeric,tarea2 numeric))x,
            (select *, (coalesce(examen1,0)+coalesce(examen2,0)+coalesce(examen3,0)+coalesce(tarea1,0)+coalesce(tarea2,0)) promedio, (case when (coalesce(examen1,0)+coalesce(examen2,0)+coalesce(examen3,0)+coalesce(tarea1,0)+coalesce(tarea2,0)) >=6 then 'Aprobado' else 'Reprobado' end) estado
              FROM   crosstab(
                 'select m.nombre nombre ,n.tipo_nota,round(n.valor_nota*ponderacion/100,2)
                from notas n
                left join materias m on (m.id=n.materias_id)
                where n.estudiantes_id=".$id."
                order by m.nombre,n.tipo_nota asc'
                 ) AS ct (nombre character varying, examen1 numeric, examen2 numeric, examen3 numeric,tarea1 numeric,tarea2 numeric))y
        where x.nombre=y.nombre");
      
           
           

      $pdf = \PDF::loadView('export_pdf', compact('reportes','datos'));
      return $pdf->download("boleta de notas.pdf");
 }
}

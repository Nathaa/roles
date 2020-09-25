<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\Estudiante;
use App\Grado;
use App\Anio;
use DateTime;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Arr;
//use Illuminate\Support\Facades\DB;

class MatriculasController extends Controller
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
        //
        $matriculas=Matricula::paginate();
        /* $llavesDeGrados = array();
        for($i=0;$i<count($matriculas);$i++){
            $llavesDeGrados[$i]=$matriculas[$i]->grados_id;
        } */
        //dd($llavesDeGrados);
        //buscara los grados con el arreglo de llaves
        /* $arregloGrados=array();
        $arregloSecciones=array();
        $arregloturnos=array();

        //dd($grado);
         for($n=0;$n<count($llavesDeGrados);$n++){
            $match=['id'=>$llavesDeGrados[$n]];
            $grado=Grado::where($match)->select('grado')->get()->toArray();
            $gradoEscribe=Arr::flatten($grado);
            //$seccion=Grado::where($match)->select('grado','seccion','turnos_id')->get()->toArray();
            //dd($gradoEscribe[0]);
            $arregloGrados[$n]=$gradoEscribe[$n];
            //dd($arregloGrados);
            //$arregloSecciones[$n]=$grado->seccion;
            //if($grado->turno_id==1){$arregloturnos[$n]="Matutino";}
            //if($grado->turno_id==2){$arregloturnos[$n]="Vespertino";}
            //if($grado->turno_id==3){$arregloturnos[$n]="Completo";}
            //
        }
        dd($arregloGrados); */

        if ($request)
       {
        /* $query=trim($request->get('search'));

           $matriculas= Matricula::where('nombre', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->get();
          //dd($matriculas); */

          /* $matriculas=DB::table('matriculas')
            ->join('grados','grados.id','=','matriculas.grados_id')
            ->join('estudiantes','estudiantes.id','=','matriculas.estudiantes_id')
            ->join('turnos','turnos.id','=','grados.turnos_id')
            ->select( 'matriculas.id','estudiantes.nombre','estudiantes.apellido','grados.grado','grados.seccion','turnos.nombre_turno')
            ->get()->toArray(); */
            $matriculas=DB::table('matriculas')
            ->join('grados','grados.id','=','matriculas.grados_id')
            ->join('estudiantes','estudiantes.id','=','matriculas.estudiantes_id')
            ->join('turnos','turnos.id','=','grados.turnos_id')
            ->join('anios','anios.id','=','grados.anios_id')
            ->select( 'anios.año','matriculas.id','estudiantes.nombre','estudiantes.apellido','grados.grado','grados.seccion','turnos.nombre_turno')
            //->groupBy('anios.año','matriculas.id','estudiantes.nombre','estudiantes.apellido','grados.grado','grados.seccion','turnos.nombre_turno')
            ->get()->toArray();
        //aqui ocurrio un choque con estudiantes.nombre y matriculas.nombre, no logra distinguir
        //a la hora de crear el arreglo de la consulta
            //dd($matriculas);
            //---------------------IGNORAR ESTO-------------------------

            //dd($matriculas);
            /* $gradosRegistrados=Matricula::select('grados_id')->distinct()->get()->toArray();
            //dd($gradosRegistrados);
            $arregloMatriculas=array();
            for($i=0;$i<count($gradosRegistrados);$i++){
                $match=['grados_id' => $gradosRegistrados[$i]];
                $estudiantesPorGrado=Matricula::where($match)->select('nombre')->distinct()->get()->toArray();
                $values=Arr::flatten($estudiantesPorGrado);
                //dd($values);
                $arregloMatriculas[$i]=implode(",", $values);
            } */
            //$match=['grados_id' => $gradosRegistrados[2]];
            //$estudiantesPorGrado=Matricula::where($match)->select('nombre')->distinct()->get()->toArray();
            //dd($estudiantesPorGrado);
            //$arregloMatriculas=array();
            //$values=Arr::flatten($estudiantesPorGrado);
            //dd($values);
            //dd(implode(";", $values));
            //for($l=0;$l<count($estudiantesPorGrado);$l++){

            //$arregloMatriculas[0]=implode(",", $values);


            //}
            //dd($arregloMatriculas);

            //---------------------FIN DE IGNORAR ESTO------------------------

            return view('matriculas.index', ['matriculas' => $matriculas]);
          //return view('matriculas.index', ['matriculas' => $matriculas, 'search' => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tipoMatricula(){
        return view('matriculas.tipoMatricula');
    }

    /* public function dataTable(){ */
    public function dataTable(Request $request){
        //funcion para mostrar los alumnos y filtrarlos para seleccionar el que se quiera
        //matricular
        //dd($request->tipo);
        //HAY QUE FILTRAR QUE LOS ESTUDIANTES YA INSCRITOS NO APARESCAN MAS
        $tipo=$request->tipo;

        //$turnos=Grado::where($match)->select('turnos_id')->groupBy('turnos_id')->get();
        //$match = ['estudiantes_id' => $grado, 'turnos_id' => $turno,'anios_id'=>$anio];
        //BUSCA LOS ESTUDIANTES QUE YA ESTAN MATRICULADOS EN LA TABLA MATRICULA
        //$listaEstudiantesYaMatriculados=Matricula::select('estudiantes_id')->get()->toArray();
        //$listaMatriculadosCortada=Arr::flatten($listaEstudiantesYaMatriculados);
        //fecha hoy para periodo extraordinario
        $fecha_actual=Carbon::createFromFormat('d/m/Y', date('d/m/Y'));
        $fechaActualSoloAnio=substr($fecha_actual, 0,-15); //extraigo solo el anio a tipo string
        $fechaActualMismoAnioLectivo=(int)$fechaActualSoloAnio;
        //fecha de el siguiente anio, matricula normal
        $fecha_actualSumar=Carbon::createFromFormat('d/m/Y', date('d/m/Y'));
        //sumo un anio
        $fecha_actualSumar->addYear();
        //subtraigo solo el anio en forma de string
        $fechaActualSumarSoloAnio=substr($fecha_actualSumar, 0,-15);
        //cast a entero para buscar en tabla anio que es integer
        $fechaActualSumarSoloAnio=(int)$fechaActualSumarSoloAnio;
        //en inscripcion normal anio lectivo sera el anio mas uno, en extemporanea sera el mismo anio actual
        $fecha_anio_lectivo=$fechaActualSumarSoloAnio;
        $listaId=array(); //para que lo lea el return
        if($tipo=="Extemporanea"){
            $listaMatriculados=DB::table('matriculas')
            ->join('grados','grados.id','=','matriculas.grados_id')
            ->join('anios','anios.id','=','grados.anios_id')
            ->where('anios.año', $fechaActualMismoAnioLectivo)
            ->select('matriculas.estudiantes_id')
            ->get()->toArray();

            $listaMatriculadosCortada=Arr::flatten($listaMatriculados);
            //dd($listaMatriculadosCortada);
            //$listaId=array();
            for($i=0;$i<count($listaMatriculadosCortada);$i++){
                $listaId[$i]=$listaMatriculadosCortada[$i]->estudiantes_id;
            };
        };
        if($tipo=="Normal"){
            $listaMatriculados=DB::table('matriculas')
            ->join('grados','grados.id','=','matriculas.grados_id')
            ->join('anios','anios.id','=','grados.anios_id')
            ->where('anios.año',$fecha_anio_lectivo)
            ->select('matriculas.estudiantes_id')
            ->get()->toArray();

            $listaMatriculadosCortada=Arr::flatten($listaMatriculados);
            //dd($listaMatriculadosCortada[0]->estudiantes_id);
            $listaId=array();
            for($i=0;$i<count($listaMatriculadosCortada);$i++){
                $listaId[$i]=$listaMatriculadosCortada[$i]->estudiantes_id;
                };
        };
        //-----Une primero las tablas de matriculas con grados y luego
        //-----la trabla anios con grados y filtra por el anio lectivo actual que es 2021
        //-----solo extre los id que no se tienen que mostrar en la tabla de estudiantes
        /*  $listaMatriculados=DB::table('matriculas') //primer modelo de busqueda
        ->join('grados','grados.id','=','matriculas.grados_id')
        ->join('anios','anios.id','=','grados.anios_id')
        ->where('anios.año',$fecha_anio_lectivo)
        ->select('matriculas.estudiantes_id')
        ->get()->toArray();

        $listaMatriculadosCortada=Arr::flatten($listaMatriculados);
        //dd($listaMatriculadosCortada[0]->estudiantes_id);
        $listaId=array();
        for($i=0;$i<count($listaMatriculadosCortada);$i++){
            $listaId[$i]=$listaMatriculadosCortada[$i]->estudiantes_id;
        }; */ //fin de primer modelo de busqueda


        //BUSCA A LOS ESTUDIANTES EXCEPTUANDO LA LISTA DE ID DE LOS YA EXISTENTES EN MATRICULA
        //$example=array(1,2,3);
        $estudiantes=Estudiante::all()->except($listaId);
        //dd($estudiantes);
        return view('matriculas.dataTable',compact('estudiantes'))->with('tipo',$tipo);

    }
    public function create(Request $request)
    {
        /*Funcionamiento. Primero llama a la url donde estan listados los alumnos, se selecciona
        uno y se hace submit, luego se pintan automaticamente los valores de el alumno en la
        vista matriculas.create, los valores en los select se pintan por medio de peticiones
        ajax con jquery usando las funciones buscaSecciones y buscaTurnos para suplir las
        peticiones*/

            $tipo=$request->input("tipoIncripcion");//recupero el tipo de inscripcion
            $id = $request->input("idEstudiante");//recupero el id de estudiante para buscar
            $estudiante=Estudiante::findOrFail($id);
            $nombre=$estudiante->nombre;
            $apellido=$estudiante->apellido;

            //Para la fecha recuperada del servidor
            $fecha_de_creacion = date('d/m/Y');
            $fecha_de_creacion=Carbon::createFromFormat('d/m/Y', date('d/m/Y'));
            $fechaDeCreacionBusqueda=Carbon::createFromFormat('d/m/Y', date('d/m/Y'));
            //dd(gettype($fecha_de_creacion));
            //arreglo que se envia para pintar el form
            //recupera los grados en un arreglo de arreglos
            $fechaBuscar="0";
            if($tipo=="Normal"){
                //si la inscripcion es normal sera para el anio siguiente y le sumo uno al anio
                //$fecha_de_creacion->addYear();
                $fechaDeCreacionBusqueda->addYear();
                $fechaBuscar=substr($fechaDeCreacionBusqueda, 0,-15);//$fecha_de_creacion.slice(0,-6);
                $fechaBuscar=(int)$fechaBuscar;
                //dd($fechaBuscar);
            };
            if($tipo=="Extemporanea"){
                $fechaBuscar=substr($fechaDeCreacionBusqueda, 0,-15);
                $fechaBuscar=(int)$fechaBuscar;
                //dd($fechaBuscar);
            };

            $anio=Anio::where('año',$fechaBuscar)->select('id')->get()->toArray();
            $anioId=Arr::flatten($anio);
            //dd($anioId[0]);
            //$id=$anioId[0];
            //dd($anioId[0]);
            //original funcional esta no filtraba por anios
            //$grados = Grado::select('grado')->groupBy('grado')->get()->toArray() ;
            //nueva con filtro FALTA ARREGLAR
            $grados=Grado::where('anios_id',$anioId[0])->select('grado')->groupBy('grado')->get()->toArray();
            //lo combierte en un arreglo simple
            $values=Arr::flatten($grados);
            //dd($values);

            $page_data = array(
                'id'=>$id,                                  //id del estudiante , requerido
                'nombre'=>$nombre,                          //nombre solo por presentacion
                'apellido'=>$apellido,                      //apellido solo por presentacion
                'fecha_de_creacion'=>$fecha_de_creacion,    //fecha de creacion , requerido
                'grados'=>$values,                          //para seleccion en comboBox
                'tipo'=>$tipo,                              //para hacer la suma de anios y colocarla en el identificador de inscripcion
                'anio'=>$anioId,                            //para filtrar en comboBox con las peticiones jQuery
                //'tipo'=>$tipo,                              //tipo de inscripcion
              );

              //$grados=Grado::
              //dd($page_data['id']);
            //return view('matriculas.create')->with('id', $id)->with('nombre', $nombre)>with('apellido', $apellido);
            return view('matriculas.create')->with('page_data',$page_data);

    }//fin de function create

    //public function buscaSecciones($grado,$turno)
    public function buscaSecciones($grado,$turno,$anio)
    {
        //se debe buscar las secciones segun el grado y turno en que esten disponibles
        if($turno=="Matutino"){$turno="1";};
        if($turno=="Vespertino"){$turno="2";};
        if($turno=="Completo"){$turno="3";};
        $match = ['grado' => $grado, 'turnos_id' => $turno,'anios_id'=>$anio];
        $secciones=Grado::where($match)->select('seccion')->groupBy('seccion')->get();
        //dd(gettype($grado));
        //settype($grado, 'string');
        //settype($turno, 'string');
        //$sql = "SELECT seccion FROM grados WHERE grado=$grado AND turnos_id=$turno";
        //$secciones =DB::select($sql,array(1,20));

        return $secciones;
    }//fin de funcion para buscar secciones

    public function buscaTurnos($grado,$anio){
    //public function buscaTurnos($grado){
        $match = ['grado' => $grado, 'anios_id' => $anio];
        //$turnos=Grado::where('grado',$grado)->select('turnos_id')->groupBy('turnos_id')->get();
        $turnos=Grado::where($match)->select('turnos_id')->groupBy('turnos_id')->get();
        //$turnos_values=Arr::flatten($turnos);
        return $turnos;
    }//fin de funcion para buscar turnos

    public function anioLectivoSiguiente(){
        $fecha= date('d/m/Y');
        $fecha=Carbon::createFromFormat('d/m/Y', date('d/m/Y'));
        $fecha->addYear();
        //$fecha->addYear();

        $fechaBuscar=substr($fecha, 0,-15);//$fecha_de_creacion.slice(0,-6);
        $fechaBuscar=(int)$fechaBuscar;
        $anio=Anio::where('año',$fechaBuscar)->select('id')->get()->toArray();

        if($anio!=null){
            $var="Existe";
            return $var;
        }else{
            $var="NoExiste";
            return $var;
        }
    }

    public function buscarGradoId($grado,$turno,$seccion,$anio){
        //buscara el id del grado seleccionado por: grado, turno , seccion y anio
        $match = ['grado' => $grado, 'anios_id' => $anio,'seccion'=>$seccion,'turnos_id'=>$turno];
        $id=Grado::where($match)->select('id')->get();
        //dd($id);
        return $id;
    }//fin de buscarGradoId

    public function buscarGradoDatos($grados_id){
        $datosGrado=Grado::where('id',$grados_id)->select('grado','seccion','turnos_id')->get()->toArray();
        return $datosGrado;
    }//fin de buscarGradoDatos
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Para guardar la matricula tengo que recibir:
        //id del estudiante,
        //id del grado,
        //fecha de la matricula (cuando se creo)
        //el nombre de la matricula (iniciales del nombre+anio de matricula)
        //la descripcion , creo q esta es opcional

        //$matriculas = matricula::create($request->all());
        $idUsuario=auth()->id();
        //$data=$request->all();
        //dd(gettype((int)$request->input("gradoId")));
        //dd($request);
        $gradosId=(int)$request->input("gradoIde");

        $matriculas = Matricula::create(['nombre'=>$request->input("nombreMat"),
                                        'descripcion'=>$request->input("descripcion"),
                                        'fecha_matricula'=>$request->input("fecha"),
                                        'users_id'=>$idUsuario,
                                        'estudiantes_id'=>(int)$request->input("estudianteId"),
                                        'grados_id'=>$gradosId,
                                        'tipoMatricula'=>$request->input("tipoMatricula"),
                                        ]);
        //dd($matriculas);
        $matriculas->save();

        return redirect()->route('matriculas.index', compact('matriculas'))
        ->with('info', 'Matrícula guardada con éxito');
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
        $matricula=DB::table('matriculas')
            ->join('grados','grados.id','=','matriculas.grados_id')
            ->join('estudiantes','estudiantes.id','=','matriculas.estudiantes_id')
            ->join('turnos','turnos.id','=','grados.turnos_id')
            ->join('anios','anios.id','=','grados.anios_id')
            ->where('matriculas.id',$id)
            ->select( 'matriculas.fecha_matricula',//
                      'matriculas.tipoMatricula',//
                      'estudiantes.nombre',//
                      'estudiantes.apellido',//
                      'grados.grado',//
                      'grados.seccion',//
                      'turnos.nombre_turno',
                      'matriculas.id',
                      'anios.año')//
            ->get()->toArray();
            //dd($matricula[0]->id);

        //$matricula=matricula::findOrFail($id);
        //return view('matriculas.show', compact('matricula'));
        //return view('matriculas.show')->with('matricula',$matricula);
        return view('matriculas.show',['matricula' => $matricula[0]]);
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

        $matricula=matricula::findOrFail($id);
        $tipo=$matricula->tipoMatricula;
        $codigoMatricula=$matricula->nombre;
        $descripcion=$matricula->descripcion;
        $fecha_matricula=$matricula->fecha_matricula;
        //dd($matricula);
        $idEstudiante=$matricula->estudiantes_id;
        $estudiante=Estudiante::findOrFail($idEstudiante);
        $nombre=$estudiante->nombre;
        $apellido=$estudiante->apellido;

        $fecha_de_creacion = date('d/m/Y');
        $fecha_de_creacion=Carbon::createFromFormat('d/m/Y', date('d/m/Y'));
        $fechaDeCreacionBusqueda=Carbon::createFromFormat('d/m/Y', date('d/m/Y'));

        $fechaBuscar="0";
        if($tipo=="Normal"){
            $fechaDeCreacionBusqueda->addYear();
            $fechaBuscar=substr($fechaDeCreacionBusqueda, 0,-15);//$fecha_de_creacion.slice(0,-6);
            $fechaBuscar=(int)$fechaBuscar;
            //dd($fechaBuscar);
        };
        if($tipo=="Extemporanea"){
            $fechaBuscar=substr($fechaDeCreacionBusqueda, 0,-15);
            $fechaBuscar=(int)$fechaBuscar;
            //dd($fechaBuscar);
        };

        $anio=Anio::where('año',$fechaBuscar)->select('id')->get()->toArray();
        $anioId=Arr::flatten($anio);

        $grados=Grado::where('anios_id',$anioId[0])->select('grado')->groupBy('grado')->get()->toArray();
        //lo combierte en un arreglo simple
        $values=Arr::flatten($grados);
        //dd($values);

        $page_data = array(
            'id'=>$id,                                  //id del estudiante , requerido
            'nombre'=>$nombre,                          //nombre solo por presentacion
            'apellido'=>$apellido,                      //apellido solo por presentacion
            'fecha_de_creacion'=>$fecha_matricula,    //fecha de creacion , requerido
            'grados'=>$values,                          //para seleccion en comboBox
            'tipo'=>$tipo,                              //para hacer la suma de anios y colocarla en el identificador de inscripcion
            'anio'=>$anioId,                            //para filtrar en comboBox con las peticiones jQuery
          );

        return view('matriculas.edit',compact('matricula'))->with('page_data',$page_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $matricula=matricula::findOrFail($id);
        //dd($matricula);
        //dd($request);
        $idUsuario=auth()->id();
        $gradosId=(int)$request->input("gradoIde");
        $matriculaEdit = ['nombre'=>$request->input("nombreMat"),
                                            'descripcion'=>$request->input("descripcion"),
                                            'fecha_matricula'=>$request->input("fecha"),
                                            //'users_id'=>$idUsuario,
                                            //'estudiantes_id'=>(int)$request->input("estudianteId"),
                                            'grados_id'=>$gradosId,
                                            'tipoMatricula'=>$request->input("tipoMatricula"),
        ];
        //$matricula->fill($request->all())->save();
        $matricula->fill($matriculaEdit);
        //dd($matricula);

        //$matricula->update($request->all());
        $matricula->update($matriculaEdit);

        return redirect()->route('matriculas.index',compact('matricula'))
        ->with('info', 'Matrícula guardado con éxito');
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
        matricula::destroy($id);

        return back()->with('info', 'Eliminada correctamente');
    }


}

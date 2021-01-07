<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth','nocache'])->group(function () {

Route::get('admin', 'AdminController@index2')->name('admin');

//estudiantes
Route::get('estudiantes', 'EstudiantesController@index')->name('estudiantes.index')
->middleware('can:estudiantes.index');
Route::get('estudiantes/crear', 'EstudiantesController@create')->name('estudiantes.create')
->middleware('can:estudiantes.create');
Route::get('estudiantes/{estudiante}', 'EstudiantesController@show')->name('estudiantes.show')
->middleware('can:estudiantes.show');
Route::post('estudiantes', 'EstudiantesController@store')->name('estudiantes.store')
->middleware('can:estudiantes.create');
Route::get('estudiantes/{estudiante}/edit', 'EstudiantesController@edit')->name('estudiantes.edit')
->middleware('can:estudiantes.edit');
Route::put('estudiantes/{estudiante}', 'EstudiantesController@update')->name('estudiantes.update')
->middleware('can:estudiantes.update');
Route::delete('estudiantes/{estudiante}', 'EstudiantesController@destroy')->name('estudiantes.destroy')
->middleware('can:estudiantes.destroy');

//Usuarios

Route::get('usuarios', 'UsersController@index')->name('usuarios.index')
->middleware('can:usuarios.index');
Route::get('usuarios/users', 'UsersController@create')->name('usuarios.create')
->middleware('can:usuarios.create');
Route::get('usuarios/{users}', 'UsersController@show')->name('usuarios.show')
->middleware('can:usuarios.show');
Route::post('usuarios', 'UsersController@store')->name('usuarios.store')
->middleware('can:usuarios.create');
Route::get('usuarios/{users}/edit', 'UsersController@edit')->name('usuarios.edit')
->middleware('can:usuarios.edit');
Route::put('usuarios/{users}', 'UsersController@update')->name('usuarios.update')
->middleware('can:usuarios.update');
Route::delete('usuarios/{users}', 'UsersController@destroy')->name('usuarios.destroy')
->middleware('can:usuarios.destroy');


Route::get('roles', 'RolesController@index')->name('roles.index')
->middleware('can:roles.index');
Route::get('roles/role', 'RolesController@create')->name('roles.create')
->middleware('can:roles.create');
Route::get('roles/{role}', 'RolesController@show')->name('roles.show')
->middleware('can:roles.show');
Route::post('roles', 'RolesController@store')->name('roles.store')
->middleware('can:roles.create');
Route::get('roles/{role}/edit', 'RolesController@edit')->name('roles.edit')
->middleware('can:roles.edit');
Route::put('roles/{role}', 'RolesController@update')->name('roles.update')
->middleware('can:roles.update');
Route::delete('roles/{role}', 'RolesController@destroy')->name('roles.destroy')
->middleware('can:roles.destroy');


//Materias
Route::resource('materias', 'MateriaController');

});


//Periodos
Route::get('periodos', 'PeriodosController@index')->name('periodos.index')
->middleware('can:periodos.index');
Route::get('periodos/periodo', 'PeriodosController@create')->name('periodos.create')
->middleware('can:periodos.create');
Route::get('periodos/{periodo}', 'PeriodosController@show')->name('periodos.show')
->middleware('can:periodos.show');
Route::post('periodos', 'PeriodosController@store')->name('periodos.store')
->middleware('can:periodos.create');
Route::get('periodos/{periodo}/edit', 'PeriodosController@edit')->name('periodos.edit')
->middleware('can:periodos.edit');
Route::put('periodos/{periodo}', 'PeriodosController@update')->name('periodos.update')
->middleware('can:periodos.update');
Route::delete('periodos/{periodo}', 'PeriodosController@destroy')->name('periodos.destroy')
->middleware('can:periodos.destroy');

//Matriculas
Route::get('matriculas', 'MatriculasController@index')->name('matriculas.index')
->middleware('can:matriculas.index');
Route::post('matriculas/matricula', 'MatriculasController@create')->name('matriculas.create')
->middleware('can:matriculas.create');
/* Route::get('matriculas/matricula', 'MatriculasController@create')->name('matriculas.create')
->middleware('can:matriculas.create'); */
Route::get('matriculas/{matricula}', 'MatriculasController@show')->name('matriculas.show')
->middleware('can:matriculas.show');
Route::post('matriculas', 'MatriculasController@store')->name('matriculas.store')
->middleware('can:matriculas.create');
Route::get('matriculas/{matricula}/edit', 'MatriculasController@edit')->name('matriculas.edit')
->middleware('can:matriculas.edit');
Route::put('matriculas/{matricula}', 'MatriculasController@update')->name('matriculas.update')
->middleware('can:matriculas.update');
Route::delete('matriculas/{matricula}', 'MatriculasController@destroy')->name('matriculas.destroy')
->middleware('can:matriculas.destroy');
//nueva ruta para el dataTable
/* Route::get('matricula/Estudiante', 'MatriculasController@dataTable')->name('matriculas.dataTable') */
Route::post('matricula/Estudiante', 'MatriculasController@dataTable')->name('matriculas.dataTable')
->middleware('can:matriculas.dataTable');
//creado para la solicitud de secciones disponibles desde matriculas/create  version 1
//Route::get('/secciones/{grado}/{turno}/grados','MatriculasController@buscaSecciones');
//version 2 de busca secciones
Route::get('/secciones/{grado}/{turno}/grados/{anio}/anio','MatriculasController@buscaSecciones');
//creado para la solicitud de turnos segun el grado disponible version 1
//Route::get('/turnos/{grado}/grados','MatriculasController@buscaTurnos');
//version 2 para buscar los turnos por grado y anio
Route::get('/turnos/{grado}/grados/{anio}/anio','MatriculasController@buscaTurnos');
//creado para saber el tipo de matricula que se va a realizar
Route::get('matricula/tipoMatricula','MatriculasController@tipoMatricula')->name('matriculas.tipoMatricula');
//->middleware('can:matriculas.tipoMatricula');
Route::get('matricula/anioLectivoSiguiente','MatriculasController@anioLectivoSiguiente')->name('matriculas.anioLectivoSiguiente');
Route::get('matricula/{grado}/grado/{turno}/turno/{seccion}/seccion/{anio}/anio','MatriculasController@buscarGradoId')->name('matriculas.buscarGradoId');
Route::get('/grado/{gradoId}','MatriculasController@buscarGradoDatos');
//para saber cuantas alumnas hay en periodo normal, es usado en el modal que muestra indicadores de cuantos hay inscritos y cuantos faltan
Route::get('/alumnasCont/{anio_id}','MatriculasController@contAlumNormal');//->middleware('can:matriculas.create');


//Anios
Route::get('anios', 'AniosController@index')->name('anios.index')
->middleware('can:anios.index');
Route::get('anios/anio', 'AniosController@create')->name('anios.create')
->middleware('can:anios.create');
Route::get('anios/{anio}', 'AniosController@show')->name('anios.show')
->middleware('can:anios.show');
Route::post('anios', 'AniosController@store')->name('anios.store')
->middleware('can:anios.create');
Route::get('anios/{anio}/edit', 'AniosController@edit')->name('anios.edit')
->middleware('can:anios.edit');
Route::put('anios/{anio}', 'AniosController@update')->name('anios.update')
->middleware('can:anios.update');
Route::delete('anios/{anio}', 'AniosController@destroy')->name('anios.destroy')
->middleware('can:anios.destroy');

//grados
Route::get('grados','GradosController@index')->name('grados.index')
->middleware('can:grados.index');
Route::get('grados/crear', 'GradosController@create')->name('grados.create')
->middleware('can:grados.create');
Route::get('grados/{grado}', 'GradosController@show')->name('grados.show')
->middleware('can:grados.show');
Route::post('grados', 'GradosController@store')->name('grados.store')
->middleware('can:grados.create');
Route::get('grados/{grado}/edit', 'GradosController@edit')->name('grados.edit')
->middleware('can:grados.edit');
Route::put('grados/{grado}', 'GradosController@update')->name('grados.update')
->middleware('can:grados.update');
Route::delete('grados/{grado}', 'GradosController@destroy')->name('grados.destroy')
->middleware('can:grados.destroy');

//turno
Route::get('turnos','TurnoController@index')->name('turnos.index')
->middleware('can:turnos.index');
Route::get('turnos/crear', 'TurnoController@create')->name('turnos.create')
->middleware('can:turnos.create');
Route::get('turnos/{turno}', 'TurnoController@show')->name('turnos.show')
->middleware('can:turnos.show');
Route::post('turnos', 'TurnoController@store')->name('turnos.store')
->middleware('can:turnos.create');
Route::get('turnos/{turno}/edit', 'TurnoController@edit')->name('turnos.edit')
->middleware('can:turnos.edit');
Route::put('turnos/{turno}', 'TurnoController@update')->name('turnos.update')
->middleware('can:grados.update');
Route::delete('turnos/{turno}', 'TurnoController@destroy')->name('turnos.destroy')
->middleware('can:turnos.destroy');
//docentes
Route::get('docentes','DocentesController@index')->name('docentes.index')
->middleware('can:docentes.index');
Route::get('docentes/crear', 'DocentesController@create')->name('docentes.create')
->middleware('can:docentes.create');
Route::get('docentes/{docente}', 'DocentesController@show')->name('docentes.show')
->middleware('can:docentes.show');
Route::post('docentes', 'DocentesController@store')->name('docentes.store')
->middleware('can:docentes.create');
Route::get('docentes/{docente}/edit', 'DocentesController@edit')->name('docentes.edit')
->middleware('can:docentes.edit');
Route::put('docentes/{docente}', 'DocentesController@update')->name('docentes.update')
->middleware('can:docentes.update');
Route::delete('docentes/{docente}', 'DocentesController@destroy')->name('docentes.destroy')
->middleware('can:docentes.destroy');

//planes
Route::get('planes','PlanEstudioController@index')->name('planesEstudio.index')
->middleware('can:planesEstudio.index');
Route::get('planes/crear', 'PlanEstudioController@create')->name('planesEstudio.create')
->middleware('can:planesEstudio.create');
Route::get('planes/{plan}', 'PlanEstudioController@show')->name('planesEstudio.show')
->middleware('can:planesEstudio.show');
Route::post('planes', 'PlanEstudioController@store')->name('planesEstudio.store')
->middleware('can:planesEstudio.create');
Route::get('planes/{plan}/edit', 'PlanEstudioController@edit')->name('planesEstudio.edit')
->middleware('can:planesEstudio.edit');
Route::put('planes/{plan}', 'PlanEstudioController@update')->name('planesEstudio.update')
->middleware('can:planesEstudio.update');
Route::delete('planes/{plan}', 'PlanEstudioController@destroy')->name('planesEstudio.destroy')
->middleware('can:planesEstudio.destroy');

//planeamiento_academico

Route::get('asignacion', 'AsignacionController@index')->name('asignaciones.index')
->middleware('can:asignaciones.index');
Route::get('asignacion/crear', 'AsignacionController@create')->name('asignaciones.create')
->middleware('can:asignaciones.create');
Route::get('asignacion/{asignacion}', 'AsignacionController@show')->name('asignaciones.show')
->middleware('can:asignaciones.show');
Route::post('asignacion', 'AsignacionController@store')->name('asignaciones.store')
->middleware('can:asignaciones.create');
Route::get('asignacion/{asignacion}/edit', 'AsignacionController@edit')->name('asignaciones.edit')
->middleware('can:asignaciones.edit');
Route::put('asignacion/{asignacion}', 'AsignacionController@update')->name('asignaciones.update')
->middleware('can:asignaciones.update');
Route::delete('asignacion/{asignacion}', 'AsignacionController@destroy')->name('asignaciones.destroy')
->middleware('can:asignaciones.destroy');

//Asignacion_Docente-Grado

Route::get('docentegrados', 'DocenteGradoController@index')->name('docentegrados.index')
->middleware('can:docentegrados.index');
Route::get('docentegrados/crear', 'DocenteGradoController@create')->name('docentegrados.create')
->middleware('can:docentegrados.create');
Route::get('docentegrados/{docentegrado}', 'DocenteGradoController@show')->name('docentegrados.show')
->middleware('can:docentegrados.show');
Route::post('docentegrados', 'DocenteGradoController@store')->name('docentegrados.store')
->middleware('can:docentegrados.create');
Route::get('docentegrados/{docentegrado}/edit', 'DocenteGradoController@edit')->name('docentegrados.edit')
->middleware('can:docentegrados.edit');
Route::put('docentegrados/{docentegrado}', 'DocenteGradoController@update')->name('docentegrados.update')
->middleware('can:docentegrados.update');
Route::delete('docentegrados/{docentegrado}', 'DocenteGradoController@destroy')->name('docentegrados.destroy')
->middleware('can:docentegrados.destroy');


//manejo de las notas
Route::get('notas','NotasController@buscarMaterias')->name('notas.confignotas');
Route::get('editarnotas/{grado}/{seccion}/{nombre}','NotasController@editarNotas')->name('notas.editarnotas');
Route::post('guardarNotas/','NotasController@guardarNotas')->name('notas.guardarNotas')
->middleware('can:notas.guardarNotas');
Route::get('ingresoNotas/{grado}/{seccion}/{nombre}','NotasController@ingresoNotas')->name('notas.ingresoNotas')
->middleware('can:notas.ingresoNotas');
Route::post('notasPeriodo/','NotasController@notasPeriodo')->name('notas.notasPeriodo')
->middleware('can:notas.notasPeriodo');
Route::post('guardarNotasIngresadas/','NotasController@guardarNotasIngresadas')->name('notas.guardarNotasIngresadas')
->middleware('can:notas.guardarNotasIngresadas');
Route::get('verPromedios/','NotasController@verPromedios')->name('notas.verPromedios')
->middleware('can:notas.verPromedios');


//reportes
Route::get('reportes', 'ReportesController@index')->name('reportes.index')
->middleware('can:reportes.index');
Route::get('reportes/{reporte}', 'ReportesController@show')->name('reportes.show')
->middleware('can:reportes.show');


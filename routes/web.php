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


Route::get('admin', 'AdminController@index2')->name('admin');



Auth::routes();

Route::middleware(['auth'])->group(function () {

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
Route::get('matriculas/matricula', 'MatriculasController@create')->name('matriculas.create')
->middleware('can:matriculas.create');
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
->middleware('can:grados.create');
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

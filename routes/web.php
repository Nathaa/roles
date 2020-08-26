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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\orderBy;

class UsersController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

     // $users= User::all(Request $request);
       // return view('usuarios.index', ['users' => $users]);

       if ($request)
       {
        $query=trim($request->get('search'));
           $users= User::where('name', 'LIKE', '%' . $query . '%')
          ->orderBy('id','asc')
          ->get();
          return view('usuarios.index', ['users' => $users, 'search' => $query]);
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
        return view('usuarios.create');
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

        $users = User::create($request->all());
        if ($request->hasfile('imagen')) {
            $path=Storage::disk('public')->put('imagenes', $request->file('imagen'));
            $users->fill(['imagen' => asset($path)])->save();

        }
       //if ($request->hasfile('imagen')) {
        //$users->imagen = $request->file('imagen')->store('public');

        $users->save();

        return redirect()->route('usuarios.index', compact('users'))
        ->with('info', 'expediente guardada con exito');
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
        $user=User::findOrFail($id);
        return view('usuarios.show', compact('user'));
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

        $user=User::findOrFail($id);
        $roles = Role::get();
        return view('usuarios.edit', compact('user','roles'));


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
        //

        $user=User::findOrFail($id);
        $user->roles()->sync($request->get('roles'));
        $user->fill($request->all())->save();


        if ($request->hasfile('imagen')) {
            $path=Storage::disk('public')->put('imagenes', $request->file('imagen'));
            $user->fill(['imagen' => asset($path)])->save();

        }
        return redirect()->route('usuarios.index',compact('user'))
        ->with('info', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {


        User::destroy($id);

        return back()->with('info', 'Eliminado correctamente');

    }


}
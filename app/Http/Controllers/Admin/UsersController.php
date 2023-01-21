<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:4',
            'password_confirmation' => 'required',
        ]);

        $data = $request->all();
        $data['password'] =  Hash::make($data['password']);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Elemento creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $validation = [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ];

        if(isset($data['password']))
        {
            $validation['password'] = 'required|confirmed|min:4';
        }

        $request->validate($validation);

        if(isset($data['password']))
        {
            $data['password'] =  Hash::make($data['password']);
        }
        else
        {
            // Laravel creó las tablas relacionadas con la autenticación, entre ellas
            // la de users y el campo password no puede ser nulo, por eso hacemos esto:
            $data['password'] = $user->password;
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Elemento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // No puede borrar su propio administrador
        if($user->id == Auth::id()) {
            return redirect()->route('users.index')->with('warning', 'No puedes borrar tu propio usuario');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Elemento borrado correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstallController extends Controller
{
    public function index()
    {
        return view('install/index');
    }

    public function user()
    {
        return view('install/user');
    }

    public function finish(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|unique:users',
            'password' => 'required',
        ]);

        $data = $request->all();
        $data['role_id'] = User::ADMIN;
        $data['password'] =  Hash::make($data['password']);

        $user = new User();
        $user->fill($data);
        $user->save();

        return view('install/finish');
    }
}

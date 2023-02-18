<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
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
        // Create an user
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

        // Create company info
        $company = new Company();
        $company->fill([
            'name' => 'Your company',
        ]);
        $company->save();

        return view('install/finish');
    }
}

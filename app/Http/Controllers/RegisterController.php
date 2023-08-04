<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view("login.register",[
            "title" => "Register"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required:min:5',
            'age' => 'required',
            'gender' => 'required',
            'level' => 'required',
        ]);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Success Create Acount');
    }
}

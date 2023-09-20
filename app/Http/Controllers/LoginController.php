<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index',[
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);



        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $waktuLogin = Carbon::now();
            $waktuLogin = session()->put('waktuLogin', $waktuLogin);
            return redirect()->intended('/dashboard')->with('success', 'Login Success');
        }
        return redirect('login')->with('error', 'Login Failed !');


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

    return redirect('/login');
    }
}

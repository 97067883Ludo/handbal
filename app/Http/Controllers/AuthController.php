<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vtiful\Kernel\Excel;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'string|required',
            'password' => 'string|required'
        ]);


        if (Auth::attempt($credentials)){
            return redirect()->route('/home');
        }

        return back()->withErrors([
            'error' => 'Deze gegevens staan niet in ons bestand',
        ]);
    }
    public function logout() {
        Auth::logout();
        Return redirect()->route('/login');
    }
    public function getLoginScreen()
    {
        return view('login');
    }
}

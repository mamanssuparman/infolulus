<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('loginadmin');
    }
    public function check(Request $request)
    {
        $validasiData = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);
        if(Auth::attempt($validasiData)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            return redirect('/auth');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/auth');
    }
}

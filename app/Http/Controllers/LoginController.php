<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function actionLogin(Request $request)
    {
        // bikin credentialnya untuk inputan login
        $credential = $request->only(['email', 'password']);
        // return $credential;
        if (Auth::attempt($credential)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->with('error', 'Email atau Password salah')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

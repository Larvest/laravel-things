<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('courses.index');
        } 
        else {
            return view('admin.auth.login');
        }
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->only('email', 'password');
            return redirect()->route('courses.index');
        } else {
            return back()->withErrors(['email' => 'Предоставленные учетные данные неверны.',]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
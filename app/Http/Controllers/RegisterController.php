<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm() {
        return view('register');
    }

    public function register(RegisterRequest $request){
        User::create($request->validated());

        return redirect()->route('loginForm');
    }
}

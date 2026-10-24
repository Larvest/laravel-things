<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view('create');
    }

    public function showForm2()
    {
        return view('create2');
    }

    public function showForm3()
    {
        return view('create3');
    }

    public function store(Request $request)
    {
        $full_name      = $request->input('full_name');
        $email          = $request->input('email');
        $phone_number   = $request->input('phone_number');

        return view('result', ['full_name' => $full_name, 'email' => $email, 'phone_number' => $phone_number]);
    }

    public function store2(Request $request)
    {
        $option      = $request->input('room');
        
        return view('result2', ['option' => $option]);
    }
    
    public function store3(Request $request)
    {
        $name      = $request->input('name');
        $place     = $request->input('place');
        $date      = $request->input('date');
        $payment   = $request->input('payment');
        $desc      = $request->input('desc');
        
        return view('result3', ['name' => $name, 
                                'place' => $place, 
                                'date' => $date, 
                                'payment' => $payment,
                                'desc' => $desc
                                ]);
    }
}

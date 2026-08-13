<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function daftar()
    {
        return view('register');
    }

    public function signup(Request $request)
    {
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');

        return view('welcome', ["firstName" => $firstName, "lastName" => $lastName]);


    }
}

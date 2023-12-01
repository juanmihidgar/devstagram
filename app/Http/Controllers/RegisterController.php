<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index () 
    {
        return view('auth.register');
    }

    public function store (Request $request) 
    {
        // dd($request)
        // dd($request->get('username'));

        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => ['required','unique:users','max:30','min:3'],
            'email' => ['required','unique:users','email', 'max:60'],
            'password' => ['required','min:6','confirmed'],
        ]);

        dd('Creando Usuario');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        // Modificar el request, para añadir el username para su posterior validación
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validación
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => ['required','unique:users','max:30','min:3'],
            'email' => ['required','unique:users','email', 'max:60'],
            'password' => ['required','min:6','confirmed'],
        ]);

        User::create([
            'name' => $request->name,
            // 'username' => Str::slug($request->username),
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autenticar un usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        // Otra forma de autenticar
        auth()->attempt($request->only('email','password'));

        // Redireccionar
        return redirect()->route('posts.index');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
       

    sleep(1);
    //validar
    $fields = $request ->validate([
        'name' => ['required','max:255'],
        'email' => ['required','email','max:255','unique:users'],
        'password' => ['required','confirmed']


    ]);

    //registrar
    $user = User::create($fields);

    //login
    Auth ::login($user);

    //redirecionar
    return redirect()->route("login");
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

    if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout (Request $request) {
       Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');
    }
}

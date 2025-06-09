<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
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
    $userID = Auth::id();
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
 
    return redirect()->route('login');
    }

    public function index(){
        $userList = User::all();

        return Inertia::render('users', [
            'usersList' => $userList,
        ]);
    }

    public function edit($id){
        $user = User::find($id);
        return Inertia::render('editUser', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'role' => 'required|string',
    ]);

    $user->update($request->only('name', 'email', 'role'));

    return redirect()->route('users')->with('success', 'Usuário atualizado com sucesso!');
}
    
    public function destroy(string $id){
        $user = User::findOrFail($id);
         $user->delete();

        return redirect()->route('users');
    }
}
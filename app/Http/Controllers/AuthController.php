<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\UsuarioRegistrado;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }
    
    public function register(Request $request)
    {
        // Validar datos de registro
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted'
        ]);
        
        // Crear usuario - AÑADE 'user_type' AQUÍ
        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'user_type' => 'user', 
        ]);
        
        // Iniciar sesión automáticamente
        Auth::login($user);

        Mail::to($user->email)->send(new UsuarioRegistrado($user));
        
        // Redirigir con mensaje de éxito
        return redirect()->route('home')->with('success', '¡Registro exitoso! Bienvenido.');
    }
    
    public function login(Request $request)
    {
        // Validar datos de login
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        $remember = $request->has('remember');
        
        // Intentar iniciar sesión
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
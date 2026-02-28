<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
            // No necesitas validar password_confirmation explícitamente si usas 'confirmed'
            'terms' => 'required|accepted' // Si quieres validar términos
        ]);
        // Crear usuario
        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']), // Usa Hash::make() en lugar de bcrypt()
        ]);
        // Iniciar sesión automáticamente
        Auth::login($user);
        
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
        $remember = $request->has('remember'); // Para el checkbox "Recordarme"
        // Intentar iniciar sesión
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate(); // Previene session fixation
            return redirect()->intended('home'); // intended() redirige a la URL que el usuario intentaba acceder
        }
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email'); // onlyInput() mantiene el email en el campo
    }
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
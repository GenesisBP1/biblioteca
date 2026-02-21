<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Verificar que el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Ahora la vista está en resources/views/home/index.blade.php
        return view('home.index');
    }
}
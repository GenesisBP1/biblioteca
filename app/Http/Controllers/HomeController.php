<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro; // FALTABA ESTA IMPORTACIÓN
use App\Models\Categorias;
// use App\Models\User; // Cuando tengas el modelo User

class HomeController extends Controller
{
    public function index()
    {
        // Obtener los libros para mostrarlos en la tabla
        $libros = Libro::with('categoria')->latest()->take(5)->get(); // Últimos 5 libros
        
        // Estadísticas para las tarjetas
        $totalLibros = Libro::count();
        $librosActivos = Libro::where('estatus', 1)->count();
        $totalUsuarios = 328; // Temporal, luego usa User::count()
        $prestamosPendientes = 5; // Temporal, luego con préstamos
        
        return view('home.index', compact(
            'libros', 
            'totalLibros', 
            'librosActivos', 
            'totalUsuarios', 
            'prestamosPendientes'
        ));
    }
}
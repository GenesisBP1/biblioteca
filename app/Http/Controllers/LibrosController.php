<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\Libro;

class LibrosController extends Controller
{
    public function create()
    {
        $categorias = Categorias::all();
        return view('libros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'isbn' => 'required|string|max:100',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'categorias' => 'required|exists:categorias,id',
        ]);

        $libro = new Libro();
        $libro->nombre = $request->nombre;
        $libro->isbn = $request->isbn;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        // CORRECCIÓN: El campo en la BD se llama 'id_categoria', no 'categoria_id'
        $libro->id_categoria = $request->categorias; 
        // CORRECCIÓN: Agregar estatus (es obligatorio en tu BD)
        $libro->estatus = 1; // 1 = activo, 0 = inactivo
        $libro->save();

        return redirect()->route('home')->with('success', 'Libro creado exitosamente.');
    }
}
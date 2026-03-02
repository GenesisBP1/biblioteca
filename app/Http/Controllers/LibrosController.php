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
        $libro->id_categoria = $request->categorias; 
        $libro->estatus = 1; 
        $libro->save();

        return redirect()->route('home')->with('success', 'Libro creado exitosamente.');
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        $categorias = Categorias::all();
        return view('libros.edit', compact('libro', 'categorias'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'isbn' => 'required|string|max:100',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id', 
        ]);

        $libro = Libro::findOrFail($id);
        $libro->nombre = $request->nombre;
        $libro->isbn = $request->isbn;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->id_categoria = $request->categoria_id; 
        $libro->save();

        return redirect()->route('home')->with('success', 'Libro actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('home')->with('success', 'Libro eliminado exitosamente.');
    }
}

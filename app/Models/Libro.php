<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categorias;

class Libro extends Model
{
    // ERROR: Estás usando $table_name, debe ser $table
    protected $table = 'libros';
    
    // Agrega esto para permitir la asignación masiva
    protected $fillable = [
        'nombre',
        'isbn',
        'autor',
        'editorial',
        'id_categoria', // Importante: en tu migración se llama 'id_categoria'
        'estatus'
    ];

     // Relación con categoría
    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria');
    }
}
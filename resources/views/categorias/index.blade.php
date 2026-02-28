@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8 pt-16 lg:pt-20">
    <!-- Cabecera -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-colors shadow-sm hover:shadow-md">
            <i class="fas fa-plus mr-2"></i>
            Agregar Categoría
        </a>
    </div>

    <!-- Mensaje de éxito (si existe) -->
    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tabla de categorías -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-100">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($categorias as $categoria)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        #{{ $categoria->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                        {{ $categoria->nombre }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('categorias.edit', $categoria->id) }}" 
                               class="inline-flex items-center px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded-lg transition-colors">
                                <i class="fas fa-edit mr-1"></i>
                                Editar
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" 
                                  method="POST" 
                                  class="inline-block"
                                  onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-colors">
                                    <i class="fas fa-trash-alt mr-1"></i>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-tags text-gray-400 text-5xl mb-4"></i>
                            <p class="text-gray-500 text-lg mb-2">No hay categorías registradas</p>
                            <p class="text-gray-400 text-sm mb-4">Comienza creando una nueva categoría</p>
                            <a href="{{ route('categorias.create') }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                                <i class="fas fa-plus mr-2"></i>
                                Crear Categoría
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Contador de categorías -->
    @if(count($categorias) > 0)
    <div class="mt-4 text-sm text-gray-600">
        Total: <span class="font-medium">{{ count($categorias) }}</span> categorías
    </div>
    @endif
</div>
@endsection
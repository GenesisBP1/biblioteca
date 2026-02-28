@extends('layout.admin')

@section('content')    
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 pt-16 lg:pt-20">
    <div class="max-w-2xl mx-auto">
        <!-- Cabecera -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Editar Categoría</h1>
            <p class="text-sm text-gray-600 mt-1">Modifica el nombre de la categoría</p>
        </div>

        <!-- Formulario -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-tags text-blue-600 text-xl"></i>
                    <span class="font-medium text-gray-700">Información de la categoría</span>
                </div>
            </div>

            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="nombre" class="block text-gray-700 text-sm font-semibold mb-2">
                        Nombre de la categoría <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="nombre" 
                        id="nombre" 
                        value="{{ old('nombre', $categoria->nombre) }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('nombre') border-red-500 @enderror"
                        placeholder="Ej: Novela, Ciencia Ficción, Historia..."
                        required
                    >
                    @error('nombre')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end space-x-3">
                    <a href="{{ route('categorias.index') }}" 
                       class="px-6 py-2 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                        <i class="fas fa-save mr-2"></i>
                        Actualizar Categoría
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layout.admin')

@section('content')    
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 pt-16 lg:pt-20">
    <div class="max-w-2xl mx-auto">
        <!-- Cabecera -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Editar Libro</h1>
            <p class="text-sm text-gray-600 mt-1">Modifica los datos del libro</p>
        </div>

        <!-- Formulario -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-book text-blue-600 text-xl"></i>
                    <span class="font-medium text-gray-700">Información del libro</span>
                </div>
            </div>

            <form action="{{ route('libros.update', $libro->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-semibold mb-2">
                        Nombre del Libro <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="nombre" 
                        id="nombre" 
                        value="{{ $libro->nombre }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('nombre') border-red-500 @enderror"
                        placeholder="Ej: Cien años de soledad"
                        required
                    >
                    @error('nombre')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="isbn" class="block text-gray-700 font-bold mb-2">ISBN del libro:</label>
                    <input 
                        type="text" 
                        name="isbn" 
                        id="isbn" 
                        value="{{ $libro->isbn }}" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('isbn') border-red-500 @enderror" 
                        required
                    >
                    @error('isbn')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="autor" class="block text-gray-700 font-bold mb-2">Autor del libro:</label>
                    <input 
                        type="text" 
                        name="autor" 
                        id="autor" 
                        value="{{ $libro->autor }}" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('autor') border-red-500 @enderror" 
                        required
                    >
                    @error('autor')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="editorial" class="block text-gray-700 font-bold mb-2">Editorial:</label>
                    <input 
                        type="text" 
                        name="editorial" 
                        id="editorial" 
                        value="{{ $libro->editorial }}" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('editorial') border-red-500 @enderror" 
                        required
                    >
                    @error('editorial')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="categoria_id" class="block text-gray-700 font-bold mb-2">Categoría del Libro:</label>
                    <select 
                        name="categoria_id" 
                        id="categoria_id" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('categoria_id') border-red-500 @enderror" 
                        required
                    >
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $libro->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end space-x-3">
                    <a href="{{ route('home') }}" 
                       class="px-6 py-2 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                        <i class="fas fa-save mr-2"></i>
                        Actualizar Libro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
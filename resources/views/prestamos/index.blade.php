@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Prestamos</h1>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('prestamos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Prestamo</a>

    <div class="bg-white shadow-md rounded-lg p-6 mt-4">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libro</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($prestamos as $prestamo)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $prestamo->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $prestamo->libro->nombre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $prestamo->usuario->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $prestamo->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
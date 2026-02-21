@extends('layout.admin')

@section('content')
<!-- todo el HTML que me mostraste -->
     <!-- Contenido principal -->
    <main class="flex-1 lg:ml-64 pt-16 lg:pt-20 px-4 sm:px-6 lg:px-8 pb-8">
        <div class="max-w-7xl mx-auto">
            <!-- Breadcrumb y título -->
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-800">Dashboard</h2>
                    <p class="text-sm text-gray-500 mt-1">Bienvenido al panel de administración</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <span class="text-sm text-gray-500 bg-white px-4 py-2 rounded-lg border border-gray-200 inline-flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-blue-600"></i>
                    </span>
                </div>
            </div>
            
            <!-- Tarjetas de estadísticas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="stat-card">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Total Libros</p>
                            <h3 class="text-2xl font-bold text-gray-800">1,250</h3>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-book text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-xs text-green-600">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>12% vs mes anterior</span>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Préstamos Activos</p>
                            <h3 class="text-2xl font-bold text-gray-800">42</h3>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-hand-holding text-green-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-xs text-green-600">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>+5 hoy</span>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Usuarios Registrados</p>
                            <h3 class="text-2xl font-bold text-gray-800">328</h3>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-purple-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-xs text-green-600">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>+18 este mes</span>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Devoluciones Pendientes</p>
                            <h3 class="text-2xl font-bold text-gray-800">5</h3>
                        </div>
                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-clock text-red-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-xs text-red-600">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        <span>3 vencidos</span>
                    </div>
                </div>
            </div>
            
            <!-- Gráfico y actividad reciente -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Gráfico (simulado) -->
                <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-semibold text-gray-800">Préstamos por día</h3>
                        <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white">
                            <option>Últimos 7 días</option>
                            <option>Último mes</option>
                        </select>
                    </div>
                    <div class="h-48 flex items-end justify-between gap-2">
                        <div class="flex-1 flex flex-col items-center gap-2">
                            <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg" style="height: 120px"></div>
                            <span class="text-xs text-gray-600">Lun</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-2">
                            <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg" style="height: 80px"></div>
                            <span class="text-xs text-gray-600">Mar</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-2">
                            <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg" style="height: 150px"></div>
                            <span class="text-xs text-gray-600">Mié</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-2">
                            <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg" style="height: 90px"></div>
                            <span class="text-xs text-gray-600">Jue</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-2">
                            <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg" style="height: 130px"></div>
                            <span class="text-xs text-gray-600">Vie</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-2">
                            <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg" style="height: 70px"></div>
                            <span class="text-xs text-gray-600">Sáb</span>
                        </div>
                        <div class="flex-1 flex flex-col items-center gap-2">
                            <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg" style="height: 60px"></div>
                            <span class="text-xs text-gray-600">Dom</span>
                        </div>
                    </div>
                </div>
                
                <!-- Actividad reciente -->
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <h3 class="font-semibold text-gray-800 mb-4">Actividad reciente</h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-plus text-green-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-800">Nuevo libro agregado</p>
                                <p class="text-xs text-gray-500">"La sombra del viento"</p>
                                <p class="text-xs text-gray-400 mt-1">Hace 5 min</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user-plus text-blue-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-800">Nuevo usuario registrado</p>
                                <p class="text-xs text-gray-500">Laura Pérez</p>
                                <p class="text-xs text-gray-400 mt-1">Hace 2 h</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-hand-holding text-yellow-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-800">Préstamo realizado</p>
                                <p class="text-xs text-gray-500">"1984" a Carlos R.</p>
                                <p class="text-xs text-gray-400 mt-1">Hace 3 h</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tabla de préstamos recientes -->
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="font-semibold text-gray-800">Préstamos recientes</h3>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Ver todos →</a>
                </div>
                
                <div class="table-responsive">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 text-gray-600">
                            <tr>
                                <th class="px-6 py-3 text-left">Usuario</th>
                                <th class="px-6 py-3 text-left">Libro</th>
                                <th class="px-6 py-3 text-left">Fecha préstamo</th>
                                <th class="px-6 py-3 text-left">Fecha devolución</th>
                                <th class="px-6 py-3 text-left">Estado</th>
                                <th class="px-6 py-3 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-xs font-semibold text-blue-600">
                                            MG
                                        </div>
                                        <span class="font-medium text-gray-800">María González</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">Cien años de soledad</td>
                                <td class="px-6 py-4">15/02/2024</td>
                                <td class="px-6 py-4">22/02/2024</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs font-medium">En tiempo</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <button class="text-gray-400 hover:text-blue-600">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-red-600">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center text-xs font-semibold text-purple-600">
                                            CR
                                        </div>
                                        <span class="font-medium text-gray-800">Carlos Rodríguez</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">1984</td>
                                <td class="px-6 py-4">10/02/2024</td>
                                <td class="px-6 py-4">17/02/2024</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-xs font-medium">Por vencer</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <button class="text-gray-400 hover:text-blue-600">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-red-600">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center text-xs font-semibold text-red-600">
                                            AM
                                        </div>
                                        <span class="font-medium text-gray-800">Ana Martínez</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">El Principito</td>
                                <td class="px-6 py-4">05/02/2024</td>
                                <td class="px-6 py-4">12/02/2024</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-medium">Vencido</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <button class="text-gray-400 hover:text-blue-600">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-gray-400 hover:text-red-600">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Paginación simple -->
                <div class="p-6 border-t border-gray-100 flex items-center justify-between">
                    <span class="text-sm text-gray-500">Mostrando 1 a 3 de 12 resultados</span>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 disabled:opacity-50" disabled>Anterior</button>
                        <button class="px-4 py-2 text-sm border border-gray-200 rounded-lg hover:bg-gray-50">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fecha dinámica
        const fechaElement = document.querySelector('.fa-calendar-alt')?.parentElement;
        if (fechaElement) {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const today = new Date().toLocaleDateString('es-ES', options);
            fechaElement.innerHTML = `<i class="fas fa-calendar-alt text-blue-600 mr-2"></i>${today}`;
        }
    });
</script>
@endsection



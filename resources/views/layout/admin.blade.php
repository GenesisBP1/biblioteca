<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Biblioteca · Panel de Control</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Tus estilos aquí (los que ya tienes) */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }
        
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }
        
        .transition-sidebar {
            transition: transform 0.3s ease-in-out;
        }
        
        .hamburger {
            width: 24px;
            height: 20px;
            position: relative;
            cursor: pointer;
            z-index: 60;
        }
        
        .hamburger span {
            display: block;
            position: absolute;
            height: 2px;
            width: 100%;
            background: #1e293b;
            border-radius: 2px;
            transition: all 0.3s ease;
        }
        
        .hamburger span:nth-child(1) { top: 0; }
        .hamburger span:nth-child(2) { top: 9px; }
        .hamburger span:nth-child(3) { top: 18px; }
        
        .hamburger.open span:nth-child(1) {
            transform: rotate(45deg);
            top: 9px;
            background: #3b82f6;
        }
        
        .hamburger.open span:nth-child(2) {
            opacity: 0;
            transform: translateX(-10px);
        }
        
        .hamburger.open span:nth-child(3) {
            transform: rotate(-45deg);
            top: 9px;
            background: #3b82f6;
        }
        
        .stat-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            border: 1px solid #f1f5f9;
            transition: all 0.2s ease;
        }
        
        .stat-card:hover {
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05);
            border-color: #e2e8f0;
            transform: translateY(-2px);
        }
        
        .menu-item-active {
            background: linear-gradient(90deg, #3b82f6 0%, #2563eb 100%);
            color: white;
        }
        
        .menu-item-active i {
            color: white;
        }
        
        .menu-item {
            transition: all 0.2s ease;
        }
        
        .menu-item:hover:not(.menu-item-active) {
            background: #f1f5f9;
            color: #1e293b;
        }
        
        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.3);
            backdrop-filter: blur(4px);
            z-index: 45;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        @media (max-width: 768px) {
            .table-responsive table {
                min-width: 600px;
            }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    
    <!-- Header principal -->
    <header class="bg-white border-b border-gray-200 fixed top-0 left-0 right-0 z-50">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <!-- Logo y menú hamburguesa -->
                <div class="flex items-center gap-3">
                    <button id="menuToggle" class="lg:hidden hamburger" aria-label="Abrir menú">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    
                    <!-- Logo -->
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-md">
                            <i class="fas fa-book-open text-white text-lg"></i>
                        </div>
                        <div class="hidden sm:block">
                            <h1 class="font-bold text-xl tracking-tight">
                                <span class="text-blue-600">Biblio</span><span class="text-gray-800">Admin</span>
                            </h1>
                            <p class="text-xs text-gray-500">Panel de control</p>
                        </div>
                    </div>
                </div>
                
                <!-- Menú desktop -->
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all flex items-center gap-2 font-medium">
                        <i class="fas fa-home text-lg"></i>
                        <span>Inicio</span>
                    </a>
                    <a href="#" class="px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all flex items-center gap-2 font-medium">
                        <i class="fas fa-users text-lg"></i>
                        <span>Usuarios</span>
                    </a>
                    <a href="#" class="px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all flex items-center gap-2 font-medium">
                        <i class="fas fa-book text-lg"></i>
                        <span>Libros</span>
                    </a>
                    <a href="#" class="px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all flex items-center gap-2 font-medium">
                        <i class="fas fa-hand-holding text-lg"></i>
                        <span>Préstamos</span>
                    </a>
                </nav>
                
                <!-- Perfil y logout -->
                <div class="flex items-center gap-4">
                    <button class="relative p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-full transition-all">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>
                    </button>
                    
                    <div class="flex items-center gap-3">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name ?? 'Usuario' }}</p>
                            <p class="text-xs text-gray-500">Administrador</p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-semibold shadow-md">
                            {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                        </div>
                    </div>
                    
                    <form action="{{ route('logout') }}" method="POST" class="hidden lg:block">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-all">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Salir</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Overlay para sidebar móvil -->
    <div id="overlay" class="sidebar-overlay"></div>
    
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-white border-r border-gray-200 z-50 transform -translate-x-full lg:translate-x-0 transition-sidebar pt-16 lg:pt-20">
        <div class="h-full flex flex-col">
            <!-- Perfil móvil -->
            <div class="p-4 border-b border-gray-100 lg:hidden">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold">
                        {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">{{ Auth::user()->name ?? 'Usuario' }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email ?? '' }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Menú del sidebar -->
            <nav class="flex-1 p-4 overflow-y-auto">
                <div class="space-y-1">
                    <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Menú principal</p>
                    
                    <a href="{{ route('home') }}" class="menu-item flex items-center gap-3 px-3 py-3 text-gray-700 rounded-xl hover:bg-gray-100 transition-all group">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all">
                            <i class="fas fa-home text-sm"></i>
                        </div>
                        <span class="font-medium">Inicio</span>
                    </a>
                    
                    <a href="#" class="menu-item flex items-center gap-3 px-3 py-3 text-gray-700 rounded-xl hover:bg-gray-100 transition-all group">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center text-green-600 group-hover:bg-green-600 group-hover:text-white transition-all">
                            <i class="fas fa-book text-sm"></i>
                        </div>
                        <span class="font-medium">Libros</span>
                    </a>
                    
                    <a href="#" class="menu-item flex items-center gap-3 px-3 py-3 text-gray-700 rounded-xl hover:bg-gray-100 transition-all group">
                        <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-600 group-hover:bg-yellow-600 group-hover:text-white transition-all">
                            <i class="fas fa-hand-holding text-sm"></i>
                        </div>
                        <span class="font-medium">Préstamos</span>
                    </a>
                    
                    <a href="#" class="menu-item flex items-center gap-3 px-3 py-3 text-gray-700 rounded-xl hover:bg-gray-100 transition-all group">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-all">
                            <i class="fas fa-users text-sm"></i>
                        </div>
                        <span class="font-medium">Usuarios</span>
                    </a>
                </div>
                
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Sistema</p>
                    
                    <a href="#" class="menu-item flex items-center gap-3 px-3 py-3 text-gray-700 rounded-xl hover:bg-gray-100 transition-all group">
                        <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center text-gray-600 group-hover:bg-gray-600 group-hover:text-white transition-all">
                            <i class="fas fa-cog text-sm"></i>
                        </div>
                        <span class="font-medium">Configuración</span>
                    </a>
                    
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full menu-item flex items-center gap-3 px-3 py-3 text-red-600 rounded-xl hover:bg-red-50 transition-all group">
                            <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center text-red-600 group-hover:bg-red-600 group-hover:text-white transition-all">
                                <i class="fas fa-sign-out-alt text-sm"></i>
                            </div>
                            <span class="font-medium">Salir</span>
                        </button>
                    </form>
                </div>
            </nav>
        </div>
    </aside>

    <!-- Aquí se inyecta el contenido de las vistas -->
    @yield('content')

    <!-- Footer -->
    @include('partials.admin.footer')

    <!-- JavaScript -->
    <script>
        (function() {
            'use strict';
            
            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            if (menuToggle && sidebar && overlay) {
                menuToggle.addEventListener('click', function() {
                    this.classList.toggle('open');
                    sidebar.classList.toggle('-translate-x-full');
                    overlay.classList.toggle('active');
                    
                    if (sidebar.classList.contains('-translate-x-full')) {
                        document.body.style.overflow = '';
                    } else {
                        document.body.style.overflow = 'hidden';
                    }
                });
                
                overlay.addEventListener('click', function() {
                    menuToggle.classList.remove('open');
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.remove('active');
                    document.body.style.overflow = '';
                });
            }
            
            let resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    if (window.innerWidth >= 1024) {
                        sidebar?.classList.remove('-translate-x-full');
                        overlay?.classList.remove('active');
                        menuToggle?.classList.remove('open');
                        document.body.style.overflow = '';
                    } else {
                        sidebar?.classList.add('-translate-x-full');
                    }
                }, 250);
            });
        })();
    </script>
</body>
</html>
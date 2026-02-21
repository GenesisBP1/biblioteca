@extends('layout.auth')
@section('content')
<!-- Contenedor principal con efecto de fondo -->
<div class="absolute inset-0 overflow-hidden">
    <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
    <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
</div>

<!-- Mostrar errores de validación -->
@if($errors->any())
    <div class="max-w-7xl mx-auto px-4 mt-4 relative z-20">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">¡Error!</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<!-- MAIN CONTENT - Formularios -->
<main class="flex-1 relative z-10 py-12">
    <div class="grid lg:grid-cols-2 gap-8 max-w-7xl mx-auto px-4">
        
        <!-- FORMULARIO DE LOGIN -->
        <div class="auth-card rounded-2xl p-8 lg:p-10">
            <div class="text-center mb-8">
                <!-- Logo -->
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl mb-4 shadow-lg float-animation">
                    <i class="fas fa-book-open text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Bienvenido de vuelta</h2>
                <p class="text-gray-600">Ingresa tus credenciales para acceder</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Email -->
                <div>
                    <label class="font-semibold text-gray-700 block mb-2" for="login_email">
                        <i class="fas fa-envelope mr-2 text-blue-500"></i>
                        Correo electrónico
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" 
                               id="login_email" 
                               name="email"
                               class="auth-input w-full pl-10 pr-3 py-3 rounded-xl bg-gray-50 @error('email') border-red-500 @enderror"
                               placeholder="tu@email.com"
                               value="{{ old('email') }}"
                               required>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="font-semibold text-gray-700 block mb-2" for="login_password">
                        <i class="fas fa-lock mr-2 text-blue-500"></i>
                        Contraseña
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" 
                               id="login_password" 
                               name="password"
                               class="auth-input w-full pl-10 pr-3 py-3 rounded-xl bg-gray-50 @error('password') border-red-500 @enderror"
                               placeholder="••••••••"
                               required>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember me & Forgot password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                    </label>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <!-- Submit button -->
                <button type="submit" class="auth-button w-full text-white py-3 px-4 rounded-xl font-semibold text-lg">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Iniciar sesión
                </button>

                <!-- Divider -->
                <div class="auth-divider my-6">
                    <span class="px-3 text-gray-500 text-sm">o continúa con</span>
                </div>

                <!-- Social login -->
                <div class="grid grid-cols-2 gap-4">
                    <button type="button" class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                        <i class="fab fa-google text-red-500 mr-2"></i>
                        <span class="text-sm font-medium text-gray-700">Google</span>
                    </button>
                    <button type="button" class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                        <i class="fab fa-github text-gray-800 mr-2"></i>
                        <span class="text-sm font-medium text-gray-700">GitHub</span>
                    </button>
                </div>

                <!-- Register link -->
                <p class="text-center text-sm text-gray-600">
                    ¿No tienes una cuenta?
                    <a href="#register" class="text-blue-600 hover:text-blue-700 font-semibold">
                        Regístrate gratis
                    </a>
                </p>
            </form>
        </div>

        <!-- FORMULARIO DE REGISTRO - CORREGIDO -->
        <div class="auth-card rounded-2xl p-8 lg:p-10">
            <div class="text-center mb-8">
                <!-- Logo -->
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-blue-600 rounded-2xl mb-4 shadow-lg float-animation">
                    <i class="fas fa-user-plus text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Crear cuenta nueva</h2>
                <p class="text-gray-600">Completa tus datos para registrarte</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf
                <!-- Nombre -->
                <div>
                    <label class="font-semibold text-gray-700 block mb-2" for="name">
                        <i class="fas fa-user mr-2 text-blue-500"></i>
                        Nombre completo
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="text" 
                               id="name" 
                               name="name"
                               class="auth-input w-full pl-10 pr-3 py-3 rounded-xl bg-gray-50 @error('name') border-red-500 @enderror"
                               placeholder="Juan Pérez"
                               value="{{ old('name') }}"
                               required>
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="font-semibold text-gray-700 block mb-2" for="register_email">
                        <i class="fas fa-envelope mr-2 text-blue-500"></i>
                        Correo electrónico
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" 
                               id="register_email" 
                               name="email"
                               class="auth-input w-full pl-10 pr-3 py-3 rounded-xl bg-gray-50 @error('email') border-red-500 @enderror"
                               placeholder="juan.perez@email.com"
                               value="{{ old('email') }}"
                               required>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="font-semibold text-gray-700 block mb-2" for="register_password">
                        <i class="fas fa-lock mr-2 text-blue-500"></i>
                        Contraseña
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" 
                               id="register_password" 
                               name="password"
                               class="auth-input w-full pl-10 pr-3 py-3 rounded-xl bg-gray-50 @error('password') border-red-500 @enderror"
                               placeholder="••••••••"
                               required>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Mínimo 8 caracteres</p>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password - CORREGIDO: type="password" -->
                <div>
                    <label class="font-semibold text-gray-700 block mb-2" for="password_confirmation">
                        <i class="fas fa-check-circle mr-2 text-blue-500"></i>
                        Confirmar contraseña
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-check-circle text-gray-400"></i>
                        </div>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation"
                               class="auth-input w-full pl-10 pr-3 py-3 rounded-xl bg-gray-50"
                               placeholder="••••••••"
                               required>
                    </div>
                </div>

                <!-- Términos y condiciones -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input type="checkbox" 
                               id="terms" 
                               name="terms"
                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                               required>
                    </div>
                    <label for="terms" class="ml-2 text-sm text-gray-600">
                        Acepto los 
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Términos y condiciones</a>
                        y la 
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Política de privacidad</a>
                    </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="auth-button w-full text-white py-3 px-4 rounded-xl font-semibold text-lg">
                    <i class="fas fa-user-plus mr-2"></i>
                    Crear cuenta
                </button>

                <!-- Divider -->
                <div class="auth-divider my-4">
                    <span class="px-3 text-gray-500 text-sm">o regístrate con</span>
                </div>

                <!-- Social register -->
                <div class="grid grid-cols-2 gap-4">
                    <button type="button" class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                        <i class="fab fa-google text-red-500 mr-2"></i>
                        <span class="text-sm font-medium text-gray-700">Google</span>
                    </button>
                    <button type="button" class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-xl hover:bg-gray-50 transition-colors">
                        <i class="fab fa-github text-gray-800 mr-2"></i>
                        <span class="text-sm font-medium text-gray-700">GitHub</span>
                    </button>
                </div>

                <!-- Login link -->
                <p class="text-center text-sm text-gray-600 mt-4">
                    ¿Ya tienes una cuenta?
                    <a href="#login" class="text-blue-600 hover:text-blue-700 font-semibold">
                        Inicia sesión
                    </a>
                </p>
            </form>
        </div>
    </div>
</main>

@endsection
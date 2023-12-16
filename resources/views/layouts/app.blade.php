<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DevStagram - @yield('titulo')</title>
        @stack('styles')
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="antialiased bg-gray-200">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    DevStagram
                </h1>
                
                <nav class="flex gap-2 items-center">
                    @auth
                        <a class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer" 
                        href="{{ route('posts.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Crear
                        </a>
                        <a class="font-bold text-gray-600 text-sm" href="{{ route('posts.index', auth()->user()->username) }}">
                            Hola 
                            <span class="font-normal">
                                {{auth()->user()->username}}
                            </span>
                        </a>
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button class="font-bold uppercase text-gray-600 text-sm" type="submit">Cerrar sesión</button>
                        </form>
                    @endauth
                    @guest
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login')}}">Login</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear Cuenta</a>
                    @endguest            
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10 ">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="text-center mt-10 p-5 text-gray-500 font-bold">
            DevStagram - Todos los derechos reservados
        </footer>
    </body>
</html>

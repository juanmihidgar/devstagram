<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DevStagram - @yield('titulo')</title>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-gray-200">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    DevStagram
                </h1>
                
                <nav class="flex gap-2 items-center">
                    @auth
                        <a class="font-bold text-gray-600 text-sm" href="#">
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

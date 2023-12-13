@extends('layouts.app')

@section('titulo')
  Inicia Sesión en DevStagram
@endsection


@section('contenido')
  <div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{ asset('img/login.jpg') }}" alt="Imagen de inicio de sesión de usuarios" />
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
      <form method="POST" action="{{route('login')}}">
          @csrf

          @if(session('mensaje'))
            <p class="bg-red-500 text-white my-2 p-4 rounded-md text text-center">
              {{ session('mensaje') }}
            </p>
          @endif

          <div class="mb-5">
            <label for="email" id="email_label" class="mb-2 block uppercase text-gray-500 font-bold">
              Email
            </label>
            <input 
              id="email" 
              name="email" 
              type="email" 
              placeholder="Tu Email De Registro" 
              class="border p-3 w-full rounded-lg
              @error('email')
                bg-red-100 border-red-500  
              @enderror"
              value="{{ old('email') }}"
            />
            
            @error('email')
              <p class="bg-red-500 text-white my-2 p-4 rounded-md text text-center">
                {{$message}}
              </p>
            @enderror
          </div>
          
          <div class="mb-5">
            <label for="password" id="password_label" class="mb-2 block uppercase text-gray-500 font-bold">
              Contraseña
            </label>
            <input 
              id="password" 
              name="password" 
              type="password" 
              placeholder="Introduce tu contraseña" 
              class="border  p-3 w-full rounded-lg
              @error('password')
                bg-red-100 border-red-500  
              @enderror"
            />
            
            @error('password')
              <p class="bg-red-500 text-white my-2 p-4 rounded-md text text-center">
                {{$message}}
              </p>
            @enderror
          </div>

          <div class="mb-5">
            <input type="checkbox" name="remember"> 
            <label class=" text-gray-500 text-sm">
              Mantener mi sesión abierta

            </label>
          </div>

          <input type="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
      </form>
    </div>
  </div>
@endsection
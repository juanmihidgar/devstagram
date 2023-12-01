@extends('layouts.app')

@section('titulo')
  Regístrate en DevStagram
@endsection


@section('contenido')
  <div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen de registro de usuarios" />
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
      <form action="{{ route('register')}}" method="POST">
          @csrf
          <div class="mb-5">
            <label for="name" id="name_label" class="mb-2 block uppercase text-gray-500 font-bold">
              Nombre
            </label>
            <input 
              id="name" 
              name="name" 
              type="text" 
              placeholder="Tu Nombre" 
              class="border p-3 w-full rounded-lg 
              @error('name')
                bg-red-100 border-red-500  
              @enderror" 
              value="{{ old('name') }}"
            />
            @error('name')
              <p class="bg-red-500 text-white my-2 p-4 rounded-md text text-center">
                {{$message}}
              </p>
            @enderror
          </div>

          <div class="mb-5">
            <label for="username" id="username_label" class="mb-2 block uppercase text-gray-500 font-bold">
              Username
            </label>
            <input 
              id="username" 
              name="username" 
              type="text" 
              placeholder="Tu Nombre De Usuario" 
              class="border p-3 w-full rounded-lg
              @error('username')
                bg-red-100 border-red-500  
              @enderror"
              value="{{ old('username') }}"
            />
            
            @error('username')
              <p class="bg-red-500 text-white my-2 p-4 rounded-md text text-center">
                {{$message}}
              </p>
            @enderror
          </div>
          
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
            <label for="password_confirmation" id="password_confirmation_label" class="mb-2 block uppercase text-gray-500 font-bold">
              Contraseña
            </label>
            <input 
              id="password_confirmation" 
              name="password_confirmation" 
              type="text" 
              placeholder="Repite tu contraseña" 
              class="border  p-3 w-full rounded-lg
              @error('password_confirmation')
                bg-red-100 border-red-500  
              @enderror"
            />
            
            @error('password_confirmation')
              <p class="bg-red-500 text-white my-2 p-4 rounded-md text text-center">
                {{$message}}
              </p>
            @enderror
          </div>

          <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
      </form>
    </div>
  </div>
@endsection
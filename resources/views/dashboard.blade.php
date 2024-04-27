@extends('layouts.app')

@section('titulo')
  Perfil: {{ $user->username }}
@endsection

@section('contenido')

  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
      <div class="w-8/12 lg:w-6/12 px-5">
        <img src="{{asset('img/user.svg')}}" alt="imagen de usuario" />
      </div>
      <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
        <p class="text-gray-700 text-2xl">{{ $user->username }}</p>

        <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
          0
          <span class="font-normal"> Seguidores</span>
        </p>
        
        <p class="text-gray-800 text-sm mb-3 font-bold">
          0
          <span class="font-normal"> Siguiendo</span>
        </p>

        <p class="text-gray-800 text-sm mb-3 font-bold">
          0
          <span class="font-normal"> Posts</span>
        </p>
      </div>
    </div>
  </div>

  <section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">
      Publicaciones
    </h2>

    @if ($posts->count())

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($posts as $post)
        <div class="flex flex-col sm:flex-row gap-5">
          <a class="w-full h-full sm:max-w-[50%]" href="{{asset('uploads') . '/' . $post->imagen }}" >
            <img class="object-fill" src="{{asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}" />
          </a>
           <div class="flex flex-col">
            <p class="text-xl font-bold first-letter:capitalize">
              {{ $post->titulo }}
            </p>
            <p class="text-sm">
              {{ $post->descripcion }}
            </p>
          </div>
        </div>
    @endforeach
    </div>

    <div class="mt-10">
      {{ $posts->links('pagination::tailwind') }}
    </div>

    @else
        <p class="text-gray-600 first-letter:capitalize text-sm text-center font bold">
           No tiene publicaciones disponibles
        </p>
    @endif
  </section>
@endsection
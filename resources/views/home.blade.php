@extends("layout.master")

@section("title", "Home Page")

@section("content")
  @auth
  <div class="my-20">
    <h2 class="text-5xl">Welcome Home</h2>
    <h3 class="text-6xl font-bold">{{auth()->user()->name}}</h3>
  </div>  
  @else

  <h3 class="text-center">
    <div class="text-8xl h-64 flex items-center justify-center text-[#7747ff]">
      <i class="fa-solid fa-lock"></i>
    </div>

    <p class="text-5xl">Vous n'êtes pas connecté</p>
    <p class="text-sm p-3 text-gray-600">Veuilliez <a href="{{route("register")}}" class="underline">vous inscrire</a> pour accèder la page d'accueil</p>
  </h3>
  @endauth
@endsection
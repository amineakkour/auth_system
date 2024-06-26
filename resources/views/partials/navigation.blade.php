@php 
  $user = Auth::user();
@endphp

<nav class="flex items-center justify-between">
  <div class="font-bold text-2xl text-[#7747ff] cursor-pointer" title="go back" onclick="window.history.back()">Auth</div>

  <ul class="flex gap-3">
    <li><a class="w-16 text-center block hover:font-medium hover:text-[#7747ff]" href="{{route("home")}}">Home</a></li>
    @auth
    @if($user->isadmin)
      <li><a class="w-16 text-center block hover:font-medium hover:text-[#7747ff]" href="{{route("users.index")}}">Users</a></li>
      @else
      <li><a class="w-28 text-center block hover:font-medium hover:text-[#7747ff]" href="{{route("users.edit", ["user" => $user->id])}}">Update Profile</a></li>
    @endif
    <li><a class="w-28 text-center block hover:font-medium hover:text-[#7747ff]" href="{{route("logout")}}">Deconnexion</a></li>
    @else
      <li><a class="w-16 text-center block hover:font-medium hover:text-[#7747ff]" href="{{route("login")}}">Login</a></li>
      <li><a class="w-16 text-center block hover:font-medium hover:text-[#7747ff]" href="{{route("register")}}">Register</a></li>
    @endauth
  </ul>
</nav>

@extends("layout.master")

@section("title", "Login Page")

@section("content")
  <div class="flex justify-center">
    <div class="max-w-md relative flex flex-col p-4 rounded-md text-black bg-white w-96 py-10">
      <div class="text-2xl font-bold mb-2 text-[#1e0e4b] text-center">Welcome back to <span class="text-[#7747ff]">App</span></div>
      <div class="text-sm font-normal mb-4 text-center text-[#1e0e4b]">Log in to your account</div>
      
      <form class="flex flex-col gap-3" method="POST" action="{{route("login")}}">
        @csrf
        
        @if(session('error'))
          <p class="text-red-600 text-sm">{{ session('error') }}</p>
          
        @elseif(session("success"))  
          <p class="text-green-600 text-sm">{{ session('success') }}</p>
        @endif

        <div class="block relative"> 
          <label for="email" class="label">Email</label>
          <input value="{{old("email") ?? session('email')}}" name="email" type="text" id="email" class="input"> 

          @error("email")
            <p class="text-red-600 text-xs pt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="block relative"> 
          <label for="password" class="label">Password</label>
          <input name="password" type="password" id="password" class="input">

          @error("password")
            <p class="text-red-600 text-xs pt-1">{{$message}}</p>
          @enderror
        </div>
        
        <div>
          </a></div>
          <button type="submit" class="bg-[#7747ff] w-max m-auto px-6 py-2 rounded text-white text-sm font-normal">Submit</button>

      </form>
    <div class="text-sm text-center mt-[1.6rem]">
      Don't have an account yet? <a class="text-sm text-[#7747ff]" href="{{route('register')}}">Register for free!</a>
    </div>
  </div>

</div>

@endsection

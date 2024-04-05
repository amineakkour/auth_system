@extends('layout.master')

@section("title", "Edit user " . $user->id)

@section("content")
  <div class="">
    <h1 class="text-2xl my-5">Edit User {{$user->id}}</h1>
    <div class="text-sm">Fields contain (*) are required</div>
    @if(session("success"))  
      <p class="text-green-600 text-sm">{{ session('success') }}</p>
    @endif

      <form action="{{route('users.update', ["user" => $user->id])}}" method="post" enctype="multipart/form-data">
      @method("PUT")
      @csrf

      <div class="inputField">
        <label>Full name*</label>
        <input type="text" value="{{old("name", $user->name)}}" name="name">
        @error("name")
        <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
      </div>

      <div class="inputField">
        <label>Username</label>
        <input type="text" value="{{old("username", $user->username)}}" name="username">
        @error("username")
          <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
      </div>

      <div class="inputField">
            <label >Picture</label>
            <input type="file" name="image" class="file:border-0 file:bg-gray-50 file:text-gray-600 file:text-sm file:font-medium">

        @error("image")
          <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
      </div>

      <div class="inputField">
        <label>Email*</label>
        <input type="email" value="{{$user->email}}" name="email">
        @error("email")
          <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
      </div>


      <div class="inputField">
        <label>New Password</label>
        <input type="email" name="new_passw">
        @error("email")
          <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
      </div>

      <div class="inputField">
        <label>Confirm Password</label>
        <input type="email" name="new_pass_confirm">
        @error("email")
          <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
      </div>

      <div class="inputField">
        <label>Birthday</label>
        <input type="date" value="{{$user->birthday}}" name="birthday">
        @error("birthday")
        <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
      </div>

      <div>
        <button type="submit" class="bg-blue-700 text-white px-2 py-2 w-16 hover:bg-blue-500">Edit</button>
      </div>
    </form>
  </div>
@endsection
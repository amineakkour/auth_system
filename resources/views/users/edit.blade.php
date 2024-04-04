@extends('layout.master')

@section("title", "Edit user " . $user->id)

{{-- $table->string('name');
$table->string("username")->nullable();
$table->string("picture")->nullable();
$table->string('email')->unique();
$table->date("birthday")->nullable();
$table->timestamp('email_verified_at')->nullable();
--}}

@section("content")
  <div class="">
    <h1 class="text-2xl my-5">Edit User {{$user->id}}</h1>

      <form action="{{route('users.update', ["user" => $user->id])}}" method="post" enctype="multipart/form-data">
      @method("PUT")
      @csrf

      <div class="inputField">
        <label for="name">Full name</label>
        <input type="text" value="{{$user->name}}">
      </div>

      <div class="inputField">
        <label for="name">Username</label>
        <input type="text" value="{{$user->username}}">
      </div>

      <div class="inputField">
        <label for="name">Profile Picture</label>
        <input type="image">
      </div>

      <div class="inputField">
        <label for="name">Email</label>
        <input type="email" value="{{$user->email}}">
      </div>

      <div class="inputField">
        <label for="name">Birthday</label>
        <input type="date" value="{{$user->birthday}}">
      </div>

      <div class="inputField">
        <label for="name">Email Verified at</label>
        <input type="date" value="{{$user->email_verified_at}}">
      </div>

      <div>
        <button type="submit" class="bg-blue-700 text-white px-2 py-2 w-16 hover:bg-blue-500">Edit</button>
      </div>
    </form>
  </div>
@endsection
@extends('layout.master')

@section("title", "Users")

@section('content')
    <div class="m-5">
      @if (session('success'))
        <div class="bg-green-50 p-2 mb-2 rounded text-green-500 text-sm">{{ session('success') }}</div>
      @endif
      <table class="table">
        <thead>
          <tr>
            <th class="border-none w-16"></th>
            <th>#Id</th>
            <th>Name</th>
            <th>email</th>
            <th>role</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($users as $user)
            <tr>
              <td><img class="rounded-full"
              src="{{ $user->image ? asset('storage/users/' . $user->image) : asset('storage/users/guest.png') }}" class="border" alt="user-profile"
              ></td>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->isadmin ? "admin" : "user"}}</td>
              <td class="w-28 bg-blue-50 text-blue-500 text-center">
                <a href="{{route('users.edit', ['user' => $user->id])}}">Edit</a>
              </td>

              <td class="w-28 bg-red-50 text-red-500 text-center">
                <form action="{{route("users.destroy", ['user' => $user->id])}}" method="POST">
                  @method("DELETE")
                  @csrf
                  <button onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </td>

            </tr>
          @endforeach
        </tbody>
      </table>
      
    </div>
    {{$users->links()}}
@endsection
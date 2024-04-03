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
            <th>#Id</th>
            <th>Name</th>
            
          </tr>
        </thead>

        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td class="w-28 bg-blue-50 text-blue-500 text-center">
                <a href="{{route('users.update.show', ['user' => $user->id])}}">Update</a>
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
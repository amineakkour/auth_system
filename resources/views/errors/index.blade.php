@extends("layout.master")


@section("title")
  Error: {{$error_message}}
@endsection

@section("content")
  <div class="text-red-600 min-h-96 my-5">
    <h1 class="text-5xl font-bold mb-4">Opps :<</h1>
    <h1 class="text-2xl font-bold">{{$error_message}}</h1>
  </div>
@endsection
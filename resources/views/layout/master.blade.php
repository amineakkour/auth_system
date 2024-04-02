<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield("title")</title>
  @vite('resources/css/app.css')
</head>
<body>
  <div class="p-3 sm:p-5">
    @include("partials.navigation")
    <div>
      @yield("content")
    </div>
  </div>

  <script src="https://kit.fontawesome.com/224933734a.js" crossorigin="anonymous"></script>
</body>
</html>
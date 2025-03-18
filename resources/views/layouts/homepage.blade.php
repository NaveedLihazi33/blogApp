<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>@yield('title','My Blog App')</title>
</head>

<body>
  <!-- Top Menu Bar -->
  <div>
    @include('partials.topMenuBar')
  </div>
  <!-- Main Body where different posts will be shown here -->
  <div class="cardHolder">
    @include('partials.blogPost')
    @include('partials.blogPost')
    @include('partials.blogPost')
    @include('partials.blogPost')
  </div>
</body>
</html>
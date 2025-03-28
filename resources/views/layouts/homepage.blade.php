<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <title>@yield('title','My Blog App')</title>
</head>

<body>
  <!-- Top Menu Bar -->
  <div>
    @include('partials.topMenuBar')
  </div>
  <div class="blogPostHeader">
    Blog Posts
  </div>
  <!-- Main Body where different posts will be shown here -->
  <div class="cardHolder">
    @if ($blogPosts->isEmpty())
    <div class="noPosts">
      Oops, There is no post. You might come back later
    </div>
    @else
    @foreach ($blogPosts as $blog )
    @include('partials.blogPost',['blog' => $blog])
    @endforeach
    @endif
    

  </div>
</body>

</html>
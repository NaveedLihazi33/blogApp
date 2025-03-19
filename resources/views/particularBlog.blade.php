<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $blog->title }}</title>
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <style>
    /* Reuse card styles with adjustments */
    .blog-detail {
      max-width: 800px;
      margin: 20px auto;
      background: var(--secondary-bg);
      padding: 20px;
      border-radius: 6px;
    }

    .blog-image {
      width: 100%;
      max-height: 400px;
      object-fit: cover;
      border-radius: 6px;
    }

    .blog-title {
      font-weight: 600;
      color: rgb(88, 87, 87);
      font-size: 1.5em;
      margin: 10px 0;
    }

    .blog-subtitle {
      font-weight: 500;
      color: rgb(100, 100, 100);
      font-size: 1.2em;
      margin: 5px 0;
    }

    .blog-description {
      font-weight: 400;
      color: rgb(120, 120, 120);
      font-size: 1em;
      line-height: 1.5;
      margin: 10px 0;
    }

    .blog-author {
      color: gray;
      font-weight: 400;
      font-size: 0.9em;
      margin-top: 20px;
    }

    .blog-author .name {
      font-weight: 600;
    }

    .read-more-btn {
      margin-top: 2rem;
      color: chocolate;
      padding: 2em;

    }
  </style>
</head>

<body>
  <nav class="topMenuParent">
    <!-- Your existing nav code -->
  </nav>

  <div class="blog-detail">
    @if ($blog->blogPostImageURL)
    <img src="{{ Storage::url($blog->blogPostImageURL) }}" alt="{{ $blog->title }}" class="blog-image">
    @endif
    <div class="blog-title">{{ $blog->title }}</div>
    <div class="blog-subtitle">{{ $blog->subtitle }}</div>
    <div class="blog-description">{{ $blog->description }}</div>
    <div class="blog-author">
      By <span class="name">{{ $blog->user->name }}</span> {{ $blog->created_at->diffForHumans() }}
    </div>
    
  </div>
  <a href="/" class="read-more-btn">Go to Posts</a>
</body>

</html>
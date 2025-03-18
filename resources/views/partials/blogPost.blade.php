<div class="card">
  <div class="card-image">
    @if ($blog->blogPostImageURL)
    <img src="{{ $blog->blogPostImageURL }}" alt="{{ $blog->title }}">
    @endif
  </div>
  <div class="category">
    Illustration
  </div>
  <div class="heading"> {{ $blog->title }}
    <div class="author"> By <span class="name">{{ $blog->user->name }}</span> {{ $blog->created_at->diffForHumans() }}</div>
  </div>
</div>
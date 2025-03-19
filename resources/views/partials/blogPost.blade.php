<div class="card">
  <div class="card-image">
    @if ($blog->blogPostImageURL)
    <img src="{{ Storage::url($blog->blogPostImageURL) }}" alt="{{ $blog->title }}">
    @else
    <div class="image-placeholder"></div>
    @endif
  </div>
  <div class="category">
    Blog Post
  </div>
  <div class="heading">
    {{ $blog->title }}
    <div class="subtitle">{{ $blog->subtitle }}</div>
    <div class="description">{{ Str::limit($blog->description, 100) }}</div>
    <div class="author">
      By <span class="name">{{ $blog->user->name }}</span> {{ $blog->created_at->diffForHumans() }}
    </div>
  </div>
  <a href="{{ route('showParticularBlog',$blog->id) }}" class="read-more-btn">Read More</a>
  
</div>
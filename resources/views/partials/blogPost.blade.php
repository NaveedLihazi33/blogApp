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
    <a href="{{ route('showParticularBlog', $blog->id) }}" class="read-more-btn">Read More</a>
    <div class="buttonHolder">
        @if ($isUserPost) <!-- Note: You used $isUserPost here, should match controller's $isUserPosts -->
            <a href="{{ route('showUpdateForm',$blog->id) }}" class="btn btn-update">Update</a>
            <form action="#" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        @endif
    </div>
</div>
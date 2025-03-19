<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/global.css') }}">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <title>Create a Blog</title>
</head>
<body>
  <div>
    <!-- Top Menu Bar -->
    @include('partials.topMenuBar')
  </div>

  <div class="loginContainer">
        <form class="form_container" method="POST" action="{{ route('blogCreate') }}" enctype="multipart/form-data">
            @csrf
            <div class="title_container">
                <p class="title">Create a New Blog Post</p>
                <span class="subtitle">Share your thoughts with the world.</span>
            </div>
            <br>

            <div class="input_container">
                <label class="input_label" for="title_field">Title</label>
                <input placeholder="Blog Title" name="title" type="text" class="input_field" id="title_field" value="{{ old('title') }}" required>
                @error('title')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            

            <div class="input_container">
                <label class="input_label" for="description_field">Description</label>
                <textarea placeholder="Write your blog content here..." name="description" class="input_field" id="description_field" rows="5" required>{{ old('description') }}</textarea>
                @error('description')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_container">
                <label class="input_label" for="image_field">Blog Image (Optional)</label>
                <svg fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg" class="icon">
                    <path stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" points="17 8 12 3 7 8"></polyline>
                    <line stroke="#141B34" stroke-width="1.5" x1="12" y1="3" x2="12" y2="15"></line>
                </svg>
                <input title="Blog Image" name="blogPostImage" type="file" accept="image/*" class="input_field file_input" id="image_field">
                @error('blogPostImage')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button title="Post Blog" type="submit" class="sign-in_btn">
                <span>Post Blog</span>
            </button>
        </form>
    </div>
</body>
</html>
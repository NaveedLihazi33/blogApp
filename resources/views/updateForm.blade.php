<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{ $blog->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <style>
        /* Reuse and adapt styles from the detail page */
        .edit-form {
            max-width: 800px;
            margin: 20px auto;
            background: var(--secondary-bg);
            padding: 20px;
            border-radius: 6px;
        }

        .form-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: 600;
            color: rgb(88, 87, 87);
            font-size: 1.1em;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            font-size: 1em;
            font-weight: 400;
            color: rgb(120, 120, 120);
            border: 1px solid rgb(200, 200, 200);
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group textarea {
            height: 150px;
            resize: vertical;
        }

        .form-group input[type="file"] {
            padding: 3px; /* Adjust for file input */
        }

        .button-holder {
            padding: 10px 0;
            display: flex;
            gap: 10px;
            justify-content: flex-start;
        }

        .btn {
            padding: 6px 12px;
            font-size: 0.9em;
            font-weight: 500;
            text-align: center;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.2s ease;
        }

        .btn-submit {
            background-color: rgb(63, 121, 230); /* Matches .category and update button */
            color: white;
        }

        .btn-submit:hover {
            background-color: rgb(45, 100, 200);
            transform: scale(1.05);
        }

        .btn-cancel {
            background-color: rgb(150, 150, 150); /* Neutral gray for cancel */
            color: white;
        }

        .btn-cancel:hover {
            background-color: rgb(130, 130, 130);
            transform: scale(1.05);
        }

        .error {
            color: rgb(230, 63, 63);
            font-size: 0.85em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <nav class="topMenuParent">
       
    </nav>

    <div class="edit-form">
        <h2>Edit Blog Post</h2>
        @if ($blog->blogPostImageURL)
            <img src="{{ Storage::url($blog->blogPostImageURL) }}" alt="{{ $blog->title }}" class="form-image">
        @endif

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" required>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" required>{{ old('description', $blog->description) }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="blogPostImage">Blog Post Image</label>
                <input type="file" name="blogPostImage" id="blogPostImage" accept="image/*">
                @error('blogPostImage')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="button-holder">
                <button type="submit" class="btn btn-submit">Save Changes</button>
                <a href="/" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
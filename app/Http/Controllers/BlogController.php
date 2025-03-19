<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create','store']);
    }
    public function create()
    {
        return view('CreateBlog');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'blogPostImage' => 'nullable|image'
        ]);

        $description = $validatedData['description'];
        $subtitle = $this->generateSubtitle($description);
        $blogPostImageURL = null;
        if ($request->hasFile('blogPostImage')) {
            $blogPostImageURL = $request->file('blogPostImage')->store('blog_images', 'public');
        }
        // Create the blog with the generated subtitle
        $blog = Blog::create([
            'title' => $validatedData['title'],
            'subtitle' => $subtitle,
            'description' => $description,
            'blogPostImageURL' => $blogPostImageURL,
            'user_id' => Auth::id(), // Automatically set to the logged-in user's ID
        ]);

        return redirect('/')->with('success', 'Blog post created successfully!');
    }

    private function generateSubtitle($description,$wordCount = 10)
    {
        // Split the description into words
        $words = explode(' ', trim($description));
        // Take the first $wordCount words (or fewer if description is shorter)
        $subtitleWords = array_slice($words, 0, $wordCount);
        // Join the words back into a string
        return implode(' ', $subtitleWords);
    }


    public function index()
    {
        $blogPosts = Blog::with('user')->get();
        // dd($blogPosts);
        return view('welcome', [
            "blogPosts" => $blogPosts
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogPosts = Blog::with('user')->get();
        // dd($blogPosts);
        return view('welcome', [
            "blogPosts" => $blogPosts
        ]);
    }
}

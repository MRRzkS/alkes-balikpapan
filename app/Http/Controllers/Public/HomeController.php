<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)->latest()->take(4)->get();
        $latestPosts = Post::published()->latest('published_at')->take(3)->get();

        return view('public.home', compact('featuredProducts', 'latestPosts'));
    }
}

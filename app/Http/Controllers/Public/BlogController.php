<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()->latest('published_at')->paginate(9);

        return view('public.blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // Draft posts are not visible on the public site.
        abort_unless($post->status === 'published' && $post->published_at, 404);

        return view('public.blog.show', compact('post'));
    }
}

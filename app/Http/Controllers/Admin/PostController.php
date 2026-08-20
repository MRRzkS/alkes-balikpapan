<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\HandlesImageUploads;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.form');
    }

    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['author_id'] = $request->user()->id;

        if ($image = $request->file('featured_image')) {
            $data['featured_image'] = $this->storeImage($image, 'posts');
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();

        if ($image = $request->file('featured_image')) {
            $data['featured_image'] = $this->storeImage($image, 'posts');
            // Replaced image: drop the old file so uploads do not grow unbounded.
            $this->deleteImage($post->featured_image);
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $this->deleteImage($post->featured_image);
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}

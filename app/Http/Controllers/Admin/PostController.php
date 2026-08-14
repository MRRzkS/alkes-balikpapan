<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
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
            $data['featured_image'] = $this->storeImage($image);
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
            $data['featured_image'] = $this->storeImage($image);
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    // Store uploads directly under public/uploads to avoid storage:link on shared hosting.
    private function storeImage($image): string
    {
        $path = $image->store('posts', 'uploads');

        return 'uploads/' . $path;
    }
}

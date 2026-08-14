<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() { return view('admin.posts.index'); }
    public function create() { return view('admin.posts.form'); }
    public function store(Request $request) { abort(501); }
    public function edit(Post $post) { return view('admin.posts.form', compact('post')); }
    public function update(Request $request, Post $post) { abort(501); }
    public function destroy(Post $post) { abort(501); }
}

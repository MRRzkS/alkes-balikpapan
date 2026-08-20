<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'postsCount' => Post::where('status', 'published')->count(),
            'productsCount' => Product::count(),
            'inquiriesCount' => Inquiry::count(),
            'unreadCount' => Inquiry::where('is_read', false)->count(),
        ]);
    }
}

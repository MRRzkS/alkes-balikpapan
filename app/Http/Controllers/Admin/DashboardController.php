<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'postsCount'      => 0,
            'productsCount'   => 0,
            'inquiriesCount'  => 0,
            'unreadCount'     => 0,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() { return view('public.products.index'); }
    public function show($product) { return view('public.products.show'); }
}

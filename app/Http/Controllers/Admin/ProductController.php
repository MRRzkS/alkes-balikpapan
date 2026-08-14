<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() { return view('admin.products.index'); }
    public function create() { return view('admin.products.form'); }
    public function store(Request $request) { abort(501); }
    public function edit(Product $product) { return view('admin.products.form', compact('product')); }
    public function update(Request $request, Product $product) { abort(501); }
    public function destroy(Product $product) { abort(501); }
}

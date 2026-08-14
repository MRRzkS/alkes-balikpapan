<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $products = Product::when($category, fn ($q) => $q->where('category', $category))
            ->latest()
            ->paginate(12);

        return view('public.products.index', [
            'products' => $products,
            'categories' => Product::CATEGORIES,
            'activeCategory' => $category,
        ]);
    }

    public function show(Product $product)
    {
        return view('public.products.show', compact('product'));
    }
}

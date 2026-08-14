<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Response;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $sitemap = Sitemap::create()
            ->add(Url::create(route('home')))
            ->add(Url::create(route('products.index')))
            ->add(Url::create(route('blog.index')))
            ->add(Url::create(route('contact')));

        Product::all()->each(function (Product $product) use ($sitemap): void {
            $sitemap->add(Url::create(route('products.show', $product)));
        });

        Post::published()->get()->each(function (Post $post) use ($sitemap): void {
            $sitemap->add(Url::create(route('blog.show', $post)));
        });

        return response($sitemap->render(), 200, ['Content-Type' => 'text/xml']);
    }
}

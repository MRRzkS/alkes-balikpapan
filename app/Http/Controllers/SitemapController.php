<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    /** Cache key shared with the Post and Product model events that invalidate it. */
    public const CACHE_KEY = 'sitemap.xml';

    public function index(): Response
    {
        // Rebuilding this walks every product and published post. The catalog changes
        // rarely and crawlers hit it often, so cache the rendered XML; Post and Product
        // forget this key whenever one is saved or deleted, so it is never stale.
        $xml = Cache::remember(self::CACHE_KEY, now()->addHours(24), function (): string {
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

            return $sitemap->render();
        });

        return response($xml, 200, ['Content-Type' => 'text/xml']);
    }
}

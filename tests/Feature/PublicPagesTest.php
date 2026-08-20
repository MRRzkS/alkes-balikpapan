<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_renders_all_required_sections_and_copy(): void
    {
        Post::factory()->count(2)->create(['status' => 'published']);
        Product::factory()->count(5)->create(['is_featured' => true]);

        $response = $this->get(route('home'));

        $response->assertOk();
        // Copy master
        $response->assertSee('Solusi Pengadaan Alat Kesehatan Terpercaya di Kalimantan Timur');
        $response->assertSee('Wahana Surya');
        $response->assertSee('Dipersembahkan oleh Wahana Surya');
        // Sections
        $response->assertSee('Tentang', false);
        $response->assertSee('Pasar', false);
        $response->assertSee('Produk Unggulan', false);
        $response->assertSee('Mengapa Memilih Kami', false);
        // JSON-LD MedicalOrganization
        $response->assertSee('MedicalOrganization', false);
        $response->assertSee('openingHoursSpecification', false);
    }

    public function test_contact_page_renders_form_and_business_info(): void
    {
        $response = $this->get(route('contact'));

        $response->assertOk();
        $response->assertSee('name="message"', false); // form field
        $response->assertSee('Palm Hills City Puri Alamanda');
        $response->assertSee('Senin–Jumat');
    }

    public function test_product_description_renders_real_line_breaks(): void
    {
        // This was {{ nl2br(e(...)) }}, which Blade escaped a second time, so visitors
        // saw a literal "<br />" in the middle of every multi-line description.
        $product = Product::factory()->create([
            'slug' => 'tabung-oksigen',
            'description' => "Baris pertama.
Baris kedua.",
        ]);

        $response = $this->get(route('products.show', $product));

        $response->assertOk();
        $response->assertSee('<br />', false);
        $response->assertDontSee('&lt;br /&gt;', false);
    }

    public function test_sitemap_includes_static_and_dynamic_routes(): void
    {
        Post::factory()->create(['status' => 'published', 'slug' => 'berita-a']);
        Product::factory()->create(['slug' => 'kursi-roda']);

        $response = $this->get('/sitemap.xml');

        $response->assertOk();
        $response->assertHeader('content-type', 'text/xml; charset=UTF-8');
        $response->assertSee('/produk/kursi-roda');
        $response->assertSee('/blog/berita-a');
        $response->assertSee(route('home'));
    }
}

<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

/**
 * Uploads land in public/uploads (no storage:link on shared hosting). Replaced and
 * deleted images used to be left behind, which fills a shared-hosting disk quota.
 */
class ImageUploadTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['is_admin' => true]);
    }

    public function test_uploading_stores_a_web_relative_path(): void
    {
        Storage::fake('uploads');

        $this->actingAs($this->admin())->post(route('admin.products.store'), [
            'name' => 'Tensimeter Digital',
            'category' => 'diagnostik',
            'image' => UploadedFile::fake()->create('tensimeter.png', 40, 'image/png'),
        ])->assertRedirect(route('admin.products.index'));

        $product = Product::firstOrFail();

        // asset() consumes this directly, so it must be "uploads/..." and never the
        // bare "uploads/" that a swallowed write failure used to produce.
        $this->assertStringStartsWith('uploads/products/', $product->image);
        Storage::disk('uploads')->assertExists(substr($product->image, strlen('uploads/')));
    }

    public function test_replacing_an_image_deletes_the_old_file(): void
    {
        Storage::fake('uploads');
        $admin = $this->admin();

        $this->actingAs($admin)->post(route('admin.products.store'), [
            'name' => 'Kursi Roda',
            'category' => 'medis',
            'image' => UploadedFile::fake()->create('lama.png', 40, 'image/png'),
        ]);

        $original = Product::firstOrFail()->image;

        $this->actingAs($admin)->put(route('admin.products.update', Product::firstOrFail()), [
            'name' => 'Kursi Roda',
            'category' => 'medis',
            'image' => UploadedFile::fake()->create('baru.png', 40, 'image/png'),
        ])->assertRedirect(route('admin.products.index'));

        $replacement = Product::firstOrFail()->image;

        $this->assertNotSame($original, $replacement);
        Storage::disk('uploads')->assertMissing(substr($original, strlen('uploads/')));
        Storage::disk('uploads')->assertExists(substr($replacement, strlen('uploads/')));
    }

    public function test_deleting_a_product_deletes_its_image(): void
    {
        Storage::fake('uploads');
        $admin = $this->admin();

        $this->actingAs($admin)->post(route('admin.products.store'), [
            'name' => 'Nebulizer',
            'category' => 'medis',
            'image' => UploadedFile::fake()->create('nebulizer.png', 40, 'image/png'),
        ]);

        $product = Product::firstOrFail();
        $path = $product->image;

        $this->actingAs($admin)->delete(route('admin.products.destroy', $product))
            ->assertRedirect(route('admin.products.index'));

        Storage::disk('uploads')->assertMissing(substr($path, strlen('uploads/')));
        $this->assertSame(0, Product::count());
    }
}

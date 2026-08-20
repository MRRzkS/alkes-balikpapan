<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['is_admin' => true]);
    }

    public function test_non_admin_cannot_access_admin_area(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($user)->get(route('admin.dashboard'));

        $response->assertForbidden(); // 403 from AdminMiddleware
    }

    public function test_dashboard_shows_counts(): void
    {
        Post::factory()->count(2)->create(['status' => 'published']);
        Post::factory()->count(1)->create(['status' => 'draft']);
        Product::factory()->count(3)->create();
        Inquiry::factory()->count(2)->create(['is_read' => false]);
        Inquiry::factory()->count(1)->create(['is_read' => true]);

        $response = $this->actingAs($this->admin())->get(route('admin.dashboard'));

        $response->assertOk();
        $response->assertSee('3');   // products
        $response->assertSee('2');   // published posts
        $response->assertSee('3');   // total inquiries
        $response->assertSee('2');   // unread inquiries
    }

    public function test_inquiry_inbox_lists_and_marks_read(): void
    {
        $inquiry = Inquiry::factory()->create(['is_read' => false]);

        $index = $this->actingAs($this->admin())->get(route('admin.inquiries.index'));
        $index->assertOk();
        $index->assertSee($inquiry->name);

        $show = $this->actingAs($this->admin())->get(route('admin.inquiries.show', $inquiry));
        $show->assertOk();
        $show->assertSee($inquiry->message);

        $this->actingAs($this->admin())
            ->patch(route('admin.inquiries.read', $inquiry));

        $this->assertDatabaseHas('inquiries', ['id' => $inquiry->id, 'is_read' => true]);
    }

    public function test_resource_show_routes_are_gone(): void
    {
        // Route::resource used to publish posts.show / products.show with no matching
        // controller method, so a GET here threw BadMethodCallException — a 500 with a
        // stack trace. The URI still carries PUT/PATCH/DELETE, so the correct answer
        // for GET is now 405 Method Not Allowed. What matters is that it is not a 5xx.
        $post = Post::factory()->create();
        $product = Product::factory()->create();

        $this->actingAs($this->admin())->get("/admin/posts/{$post->id}")->assertStatus(405);
        $this->actingAs($this->admin())->get("/admin/products/{$product->id}")->assertStatus(405);
    }

    public function test_admin_can_create_product_in_a_category(): void
    {
        $this->actingAs($this->admin());

        $response = $this->post(route('admin.products.store'), [
            'name' => 'Kursi Roda Aluminium',
            'category' => 'diagnostik',
            'description' => 'Kursi roda ringan untuk homecare.',
            'is_featured' => '1',
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('products', [
            'name' => 'Kursi Roda Aluminium',
            'category' => 'diagnostik',
            'is_featured' => true,
        ]);
    }
}

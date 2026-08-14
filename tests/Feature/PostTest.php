<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['is_admin' => true]);
    }

    public function test_admin_can_create_a_published_post_with_slug(): void
    {
        $this->actingAs($this->admin());

        $response = $this->post(route('admin.posts.store'), [
            'title' => 'Cara Memilih Alat Kesehatan K3 Tambang',
            'excerpt' => 'Panduan singkat pemilihan alkes K3.',
            'body' => 'Isi artikel lengkap tentang alkes K3 untuk tambang.',
            'status' => 'published',
        ]);

        $response->assertRedirect(route('admin.posts.index'));
        $this->assertDatabaseHas('posts', [
            'title' => 'Cara Memilih Alat Kesehatan K3 Tambang',
            'slug' => 'cara-memilih-alat-kesehatan-k3-tambang',
            'status' => 'published',
        ]);
    }

    public function test_public_blog_shows_only_published_posts(): void
    {
        Post::create([
            'title' => 'Published Post',
            'slug' => 'published-post',
            'excerpt' => 'x',
            'body' => 'y',
            'status' => 'published',
        ]);
        Post::create([
            'title' => 'Draft Post',
            'slug' => 'draft-post',
            'excerpt' => 'x',
            'body' => 'y',
            'status' => 'draft',
        ]);

        $response = $this->get(route('blog.index'));

        $response->assertOk();
        $response->assertSee('Published Post');
        $response->assertDontSee('Draft Post');
    }

    public function test_admin_can_delete_a_post(): void
    {
        $this->actingAs($this->admin());
        $post = Post::create([
            'title' => 'To Delete',
            'slug' => 'to-delete',
            'excerpt' => 'x',
            'body' => 'y',
            'status' => 'draft',
        ]);

        $response = $this->delete(route('admin.posts.destroy', $post));

        $response->assertRedirect(route('admin.posts.index'));
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}

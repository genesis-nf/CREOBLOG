<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostIndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_list_of_posts()
    {
        Post::factory()->create(['title' => 'Primer Post']);
        Post::factory()->create(['title' => 'Segundo Post']);

        $response = $this->get(route('posts.index'));

        $response->assertStatus(200);

        $response->assertSee('Primer Post');
        $response->assertSee('Segundo Post');
    }
}

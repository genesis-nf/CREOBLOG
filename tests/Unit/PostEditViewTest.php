<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostEditViewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_edit_form_for_post()
    {
        $post = Post::factory()->create([
            'title' => 'Example Post',
            'subtitle' => 'Example Subtitle',
            'body' => 'Example Body Content',
        ]);

        $response = $this->get(route('posts.edit', $post->id));

        $response->assertStatus(200);
        $response->assertSee('Example Post');
        $response->assertSee('Example Subtitle');
        $response->assertSee('Example Body Content');
    }
}

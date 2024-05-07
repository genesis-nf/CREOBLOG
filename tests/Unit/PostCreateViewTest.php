<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostCreateViewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_create_form_for_post()
    {
        $response = $this->get(route('posts.create'));

        $response->assertStatus(200);
        $response->assertSee('Título');
        $response->assertSee('Subtítulo');
        $response->assertSee('Contenido');
    }
}

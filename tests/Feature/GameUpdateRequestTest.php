<?php

namespace Tests\Feature;

use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameUpdateRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_accepts_partial_valid_data()
    {
        $game = Game::factory()->create();

        $response = $this->putJson("/api/games/{$game->id}", [
            'title' => 'Novo Título'
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'Novo Título']);
    }

    public function test_update_fails_with_invalid_data()
    {
        $game = Game::factory()->create();

        $response = $this->putJson("/api/games/{$game->id}", [
            'title' => ['array'],
            'price' => 'grátis',
            'image' => true,
            'developer' => 123,
            'total_sales' => 'mil',
            'category' => [],
            'publisher' => 0.5,
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors([
                     'title',
                     'price',
                     'image',
                     'developer',
                     'total_sales',
                     'category',
                     'publisher',
                 ]);
    }
}

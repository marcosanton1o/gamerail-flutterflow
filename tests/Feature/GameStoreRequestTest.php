<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameStoreRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_requires_all_required_fields()
    {
        $response = $this->postJson('/api/games', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors([
                     'title',
                     'price',
                     'developer',
                     'total_sales',
                     'category',
                     'publisher',
                 ]);
    }

    public function test_store_fails_with_invalid_data()
    {
        $response = $this->postJson('/api/games', [
            'title' => ['array'],
            'price' => 'free',
            'image' => 123,
            'developer' => null,
            'total_sales' => 'ten',
            'category' => 456,
            'publisher' => false,
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

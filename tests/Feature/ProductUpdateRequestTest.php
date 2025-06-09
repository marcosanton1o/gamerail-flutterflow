<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductUpdateRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_accepts_partial_data()
    {
        $product = Product::factory()->create();

        $response = $this->putJson("/api/products/{$product->id}", [
            'price' => 199.99
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['price' => 199.99]);
    }

    public function test_update_fails_with_invalid_data()
    {
        $product = Product::factory()->create();

        $response = $this->putJson("/api/products/{$product->id}", [
            'price' => -99,
            'total_sales' => -10,
            'name' => ['array'],
            'image' => 999,
            'category' => str_repeat('y', 101),
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors([
                     'price',
                     'total_sales',
                     'name',
                     'image',
                     'category',
                 ]);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductStoreRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_requires_all_fields()
    {
        $response = $this->postJson('/api/products', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors([
                     'name',
                     'image',
                     'description',
                     'price',
                     'total_sales',
                     'category',
                 ]);
    }

    public function test_store_fails_with_invalid_data()
    {
        $response = $this->postJson('/api/products', [
            'name' => 123,
            'image' => false,
            'description' => 456,
            'price' => -10,
            'total_sales' => -5,
            'category' => str_repeat('x', 101),
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors([
                     'name',
                     'image',
                     'description',
                     'price',
                     'total_sales',
                     'category',
                 ]);
    }
}

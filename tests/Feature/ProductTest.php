<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_all_products()
    {
        Product::factory()->count(2)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
                 ->assertJsonCount(2, 'Products');
    }

    public function test_can_create_product()
    {
        $data = [
            'name' => 'Novo Produto',
            'price' => 149.99,
            'description' => 'Produto incrível',
            'total_sales' => 10000,
            'image' => 'produto.jpg',
            'category' => 'Eletrônicos',
        ];

        $response = $this->postJson('/api/products', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Novo Produto']);

        $this->assertDatabaseHas('products', ['name' => 'Novo Produto']);
    }

    public function test_can_update_product()
    {
        $product = Product::create([
            'name' => 'Produto Antigo',
            'price' => 99.99,
            'description' => 'Descrição antiga',
            'total_sales' => 500,
            'image' => 'antigo.jpg',
            'category' => 'Casa',
        ]);

        $updatedData = [
            'name' => 'Produto Atualizado',
            'price' => 129.99,
            'description' => 'Descrição nova',
            'total_sales' => 1500,
            'image' => 'novo.jpg',
            'category' => 'Tecnologia',
        ];

        $response = $this->putJson("/api/products/{$product->id}", $updatedData);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Produto Atualizado']);

        $this->assertDatabaseHas('products', ['name' => 'Produto Atualizado']);
    }

    public function test_can_delete_product()
    {
        $product = Product::create([
            'name' => 'Produto Deletável',
            'price' => 59.99,
            'description' => 'Para deletar',
            'total_sales' => 300,
            'image' => 'imagem.jpg',
            'category' => 'Games',
        ]);

        $response = $this->deleteJson("/api/products/{$product->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}

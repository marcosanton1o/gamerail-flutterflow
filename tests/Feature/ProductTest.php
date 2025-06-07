<?php

use App\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_a_successful_response()
    {
        $response = $this->get('/product');

        $response->assertStatus(200);
    }

    public function test_returns_a_successful_response_create()
    {
        Product::create([
            'name' => 'Produto Teste',
            'image' => 'imagem.jpg',
            'description' => 'Descrição do produto',
            'price' => 99.90,
            'total_sales' => 10,
            'category' => 'Eletrônicos',
        ]);

        $response = $this->get('/product');

        $response->assertStatus(200);
        $response->assertDontSee(__('no products found'));
    }

    public function test_returns_a_successful_response_update()
    {
        $product = Product::create([
            'name' => 'Produto Teste',
            'image' => 'imagem.jpg',
            'description' => 'Descrição do produto',
            'price' => 99.90,
            'total_sales' => 10,
            'category' => 'Eletrônicos',
        ]);

        $response = $this->put("/product/{$product->id}", [
            'name' => 'Produto Atualizado',
            'image' => 'imagem2.jpg',
            'description' => 'Nova descrição',
            'price' => 89.90,
            'total_sales' => 20,
            'category' => 'Games',
        ]);

        $response->assertRedirect('/product');

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Produto Atualizado',
        ]);
    }

    public function test_returns_a_successful_response_delete()
    {
        $product = Product::create([
            'name' => 'Produto para deletar',
            'image' => 'imagem.jpg',
            'description' => 'Descrição do produto',
            'price' => 49.90,
            'total_sales' => 5,
            'category' => 'Livros',
        ]);

        $response = $this->delete("/product/{$product->id}");

        $response->assertRedirect('/product');

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}

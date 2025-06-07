<?php

use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_all_games()
    {
        Game::factory()->count(2)->create();

        $response = $this->getJson('/api/games');

        $response->assertStatus(200)
                 ->assertJsonCount(2);
    }

    public function test_can_create_game()
    {
        $data = [
            'title' => 'Novo Jogo',
            'price' => 149.99,
            'developer' => 'Dev Studio',
            'total_sales' => 10000,
            'image' => 'imagem.jpg',
            'publisher' => 'Editora X',
            'category' => 'Ação',
        ];

        $response = $this->postJson('/api/games', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['title' => 'Novo Jogo']);

        $this->assertDatabaseHas('games', ['title' => 'Novo Jogo']);
    }

    public function test_can_update_game()
    {
        $game = Game::create([
            'title' => 'Antigo Jogo',
            'price' => 99.99,
            'developer' => 'Old Dev',
            'total_sales' => 500,
            'image' => 'antigo.jpg',
            'publisher' => 'OldPub',
            'category' => 'Puzzle',
        ]);

        $updatedData = [
            'title' => 'Jogo Atualizado',
            'price' => 129.99,
            'developer' => 'Novo Dev',
            'total_sales' => 1500,
            'image' => 'novo.jpg',
            'publisher' => 'NovaPub',
            'category' => 'Aventura',
        ];

        $response = $this->putJson("/api/games/{$game->id}", $updatedData);

        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'Jogo Atualizado']);

        $this->assertDatabaseHas('games', ['title' => 'Jogo Atualizado']);
    }

    public function test_can_delete_game()
    {
        $game = Game::create([
            'title' => 'Para Deletar',
            'price' => 59.99,
            'developer' => 'DevX',
            'total_sales' => 300,
            'image' => 'delete.jpg',
            'publisher' => 'DelPub',
            'category' => 'Horror',
        ]);

        $response = $this->deleteJson("/api/games/{$game->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('games', ['id' => $game->id]);
    }
}

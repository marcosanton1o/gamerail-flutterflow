<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return response()->json([
            'total_games' => $games->count(),
            'games' => $games
        ]);
    }

    public function store(GameRequest $request)
    {
        $game = Game::create([
            'title' => $request->title,
            'price' => $request->price,
            'developer' => $request->developer,
            'publisher' => $request->publisher,
            'category' => $request->category,
            'total_sales' => $request->input('total_sales', 0),
            'image' => $request->input('image', 'images/default.png'),
        ]);

        return response()->json([
            'message' => 'Jogo criado com sucesso!',
            'game' => $game
        ], 201);
    }

    public function show($id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json(['message' => 'Jogo não encontrado'], 404);
        }

        return response()->json($game);
    }

    public function update(GameRequest $request, $id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json(['message' => 'Jogo não encontrado'], 404);
        }

        $game->update($request->all());

        return response()->json([
            'message' => 'Jogo atualizado com sucesso!',
            'game' => $game
        ]);
    }

    public function destroy($id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json(['message' => 'Jogo não encontrado'], 404);
        }

        $game->delete();

        return response()->json(['message' => 'Jogo deletado com sucesso!']);
    }
}

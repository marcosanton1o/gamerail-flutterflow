<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GameStoreRequest;
use App\Http\Requests\GameUpdateRequest;
use App\Models\Game;
use Illuminate\Http\JsonResponse;

class GameController extends Controller
{

    public function index()
    {
        $gamestotal = Game::count();
        $games = Game::All();

        return response()->json([
            'gamestotal' => $gamestotal,
            'games' => $games
        ]);
    }

    public function store(GameStoreRequest $request)
    {
        $game = Game::create([
            'title' => $request->title,
            'price' => $request->price,
            'developer' => $request->developer,
            'publisher' => $request->publisher,
            'category' => $request->category,
            'total_sales' => $request->total_sales,
            'image' => $request->image,
        ]);

        return response()->json([
            'message' => 'Jogo criado com sucesso!',
            'game' => $game
        ], 201);
    }

    public function show($id)
{
    $game = \App\Models\Game::find($id);

    if (!$game) {
        return response()->json(['message' => 'Game not found'], 404);
    }

    return response()->json($game);
}

    public function update(GameUpdateRequest $request, $id)
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

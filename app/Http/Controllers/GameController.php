<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use App\Models\Game;

class GameController extends Controller
{
public function handle(Request $request)
{
    $action = $request->input('action');

    switch ($action) {
        case 'create':
            $game = new Game;
            $game->title         = $request->title;
            $game->price         = $request->price;
            $game->developer     = $request->developer;
            $game->publisher     = $request->publisher;
            $game->description   = $request->description;
            $game->release_date  = $request->release_date;
            $game->category      = $request->category;
            $game->save();

            return response()->json([
                'message' => 'Jogo criado com sucesso!',
                'data' => $game
            ]);

        case 'update':
            $game = Game::findOrFail($request->id);
            $game->update($request->only([
                'title', 'price', 'developer', 'publisher',
                'description', 'release_date', 'category'
            ]));

            return response()->json([
                'message' => 'Jogo atualizado com sucesso!',
                'data' => $game
            ]);

        case 'delete':
            $game = Game::findOrFail($request->id);
            $game->delete();

            return response()->json([
                'message' => 'Jogo deletado com sucesso!',
                'deleted' => true
            ]);

        case 'list':
            $games = Game::all();
            return response()->json([
                'data' => $games
            ]);

        case 'show':
            $game = Game::findOrFail($request->id);
            return response()->json([
                'data' => $game
            ]);

        default:
            return response()->json([
                'message' => 'Ação inválida',
                'error' => true
            ], 400);
    }
}
}

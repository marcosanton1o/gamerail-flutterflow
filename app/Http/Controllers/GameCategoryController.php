<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GameCategoryStoreRequest;
use App\Http\Requests\GameCategoryUpdateRequest;
use App\Models\Game;
use App\Models\GameCategory;
use Illuminate\Http\JsonResponse;

class GameController extends Controller
{

    public function index()
    {
        $gamescategoriestotal = GameCategory::count();
        $gamescategories = GameCategory::All();

        return response()->json([
            'game_categorytotal' => $gamestotal,
            'game_category' => $game_category
        ]);
    }

    public function store(GameCategoryStoreRequest $request)
    {
        $game_category = GameCategory::create([
            'name' => $request->name,
            'description' => $request->description,

        ]);

        return response()->json([
            'message' => 'Categoria criado com sucesso!',
            'game_category' => $game_category
        ], 201);
    }

    public function show($id)
    {
        $game_category = GameCategory::find($id);

        if (!$game_category) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        return response()->json($game_category);
    }

    public function update(GameCategoryUpdateRequest $request, $id)
    {
        $game_category = GameCategory::find($id);

        if (!$game_category) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        $game_category->update($request->all());

        return response()->json([
            'message' => 'Categoria atualizado com sucesso!',
            'game_category' => $game_category
        ]);
    }

    public function destroy($id)
    {
        $game_category = GameCategory::find($id);

        if (!$game_category) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        $game_category->delete();

        return response()->json(['message' => 'Jogo deletado com sucesso!']);
    }
}

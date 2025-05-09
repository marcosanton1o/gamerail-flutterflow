<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with(['developer', 'publisher','category'])->get();
        $totalGames = $games->count();
        return view('games.index', compact('games', 'totalGames'));
    }

    public function create()
    {
        $companies = Company::all();
        $categories = GameCategory::all();
       return view('games.create', compact('companies', 'categories'));
    }

    public function store(GameRequest $request)
{
    $game = new Game;
    $game->title            = $request->title;
    $game->price            = $request->price;
    $game->developer     = $request->developer;
    $game->publisher     = $request->publisher;
    $game->description      = $request->description;
    $game->release_date     = $request->release_date;
    $game->category = $request->category;
    $game->save();

    session()->flash('message', 'O jogo: ' . $request->title . ' foi adicionado com sucesso!');
    return redirect('/games');
}
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $game = Game::findOrFail($id);
        $companies = Company::all();
        $categories = GameCategory::all();
            return view('games.edit', compact('game', 'companies', 'categories'));
        }

        public function update(GameRequest $request, $id)
        {
                $game = Game::findOrFail($id);
                $game->update($request->all());

            session()->flash('message', 'O jogo: ' . $request->title . ' foi atualizado com sucesso!');
            return redirect()->route('games.index');
        }

    public function destroy(string $id)
    {
        $games = Game::findOrFail($id);
        $games->delete();
        session()->flash('message', 'O jogo: ' . $games->title . ' foi deletado com sucesso!');
        return redirect('/games');
    }
}

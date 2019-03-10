<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User_game;
use Illuminate\Http\Request;

class User_gameController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user_games = User_game::orderBy('id', 'desc')->paginate(10);

		return view('user_games.index', compact('user_games'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('user_games.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user_game = new User_game();

		$user_game->user_id = $request->input("user_id");
        $user_game->game_id = $request->input("game_id");
        $user_game->game_rank = $request->input("game_rank");

		$user_game->save();

		return redirect()->route('user_games.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user_game = User_game::findOrFail($id);

		return view('user_games.show', compact('user_game'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user_game = User_game::findOrFail($id);

		return view('user_games.edit', compact('user_game'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$user_game = User_game::findOrFail($id);

		$user_game->user_id = $request->input("user_id");
        $user_game->game_id = $request->input("game_id");
        $user_game->game_rank = $request->input("game_rank");

		$user_game->save();

		return redirect()->route('user_games.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user_game = User_game::findOrFail($id);
		$user_game->delete();

		return redirect()->route('user_games.index')->with('message', 'Item deleted successfully.');
	}

}

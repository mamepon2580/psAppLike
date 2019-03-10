<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rank;
use Illuminate\Http\Request;

class RankController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ranks = Rank::orderBy('id', 'desc')->paginate(10);

		return view('ranks.index', compact('ranks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ranks.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$rank = new Rank();

		$rank->game_id = $request->input("game_id");
        $rank->rank_int = $request->input("rank_int");
        $rank->rank_str = $request->input("rank_str");

		$rank->save();

		return redirect()->route('ranks.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$rank = Rank::findOrFail($id);

		return view('ranks.show', compact('rank'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rank = Rank::findOrFail($id);

		return view('ranks.edit', compact('rank'));
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
		$rank = Rank::findOrFail($id);

		$rank->game_id = $request->input("game_id");
        $rank->rank_int = $request->input("rank_int");
        $rank->rank_str = $request->input("rank_str");

		$rank->save();

		return redirect()->route('ranks.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$rank = Rank::findOrFail($id);
		$rank->delete();

		return redirect()->route('ranks.index')->with('message', 'Item deleted successfully.');
	}

}

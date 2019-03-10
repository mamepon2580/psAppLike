<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$chats = Chat::orderBy('id', 'desc')->paginate(10);

		return view('chats.index', compact('chats'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('chats.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$chat = new Chat();

		$chat->send_user_id = $request->input("send_user_id");
        $chat->receive_user_id = $request->input("receive_user_id");
        $chat->text = $request->input("text");

		$chat->save();

		return redirect()->route('chats.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$chat = Chat::findOrFail($id);

		return view('chats.show', compact('chat'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$chat = Chat::findOrFail($id);

		return view('chats.edit', compact('chat'));
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
		$chat = Chat::findOrFail($id);

		$chat->send_user_id = $request->input("send_user_id");
        $chat->receive_user_id = $request->input("receive_user_id");
        $chat->text = $request->input("text");

		$chat->save();

		return redirect()->route('chats.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$chat = Chat::findOrFail($id);
		$chat->delete();

		return redirect()->route('chats.index')->with('message', 'Item deleted successfully.');
	}

}

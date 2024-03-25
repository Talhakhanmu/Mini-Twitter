<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        $tweet = new Tweet();
        $tweet->content = $request->input('content');
        $tweet->title = $request->input('title');

        $tweet->save();

        return response()->json($tweet, 201);
    }
    public function index()
{
    $tweets = Tweet::all();

    return response()->json($tweets);
}
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string|max:255',
    ]);

    $tweet = Tweet::findOrFail($id);
    $tweet->update([
        'title' => $request->title,
        'content' => $request->content,
    ]);

    return response()->json($tweet);
}
public function destroy($id)
{
    $tweet = Tweet::findOrFail($id);
    $tweet->delete();

    return response()->json(['message' => 'Tweet deleted successfully']);
}
public function edit($id)
{
    $tweet = Tweet::findOrFail($id);

    return response()->json($tweet);
}
public function show($id)
{
    $tweet = Tweet::findOrFail($id);

    return response()->json($tweet);
}
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'forum')->latest()->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $forums = Forum::all();
        return view('post.create', compact('forums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:191',
            'description' => 'required|string',
            'ref_forum' => 'required|exists:forums,id',
        ]);

        Post::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'ref_user' => Auth::id(),
            'ref_forum' => $request->ref_forum,
        ]);

        return redirect()->route('post.index');
    }

    public function show($id)
    {
        $post = Post::with(['messages.sender', 'user', 'forum'])->findOrFail($id);
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $forums = Forum::all();
        return view('post.edit', compact('post', 'forums'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'titre' => 'required|string|max:191',
            'description' => 'required|string',
            'ref_forum' => 'required|exists:forums,id',
        ]);

        $post->update($request->all());

        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
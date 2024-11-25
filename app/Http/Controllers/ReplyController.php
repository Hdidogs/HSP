<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Message;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'ref_message' => 'required|exists:messages,id',
            'ref_user' => 'required|exists:users,id',
            'libelle' => 'required|string|max:255',
            'ref_forum' => 'required|exists:forums,id',
        ]);

        // Create the reply
        $newMessage = Message::create([
            'libelle' => $validatedData['libelle'],
            'ref_user' => $validatedData['ref_user'],
            'ref_forum' => $validatedData['ref_forum'],
            'downvote' => 0,
            'upvote' => 0,
        ]);

        Reply::create([
            'ref_reply' => $newMessage->id,
            'ref_message' => $validatedData['ref_message'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Reply created successfully.');
    }

    public function edit($id)
    {
        // Retrieve the reply
        $reply = Message::findOrFail($id);

        // Return the edit view with the reply data
        return view('replies.edit', compact('reply'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        // Retrieve the reply
        $reply = Message::findOrFail($id);

        // Update the reply
        $reply->update([
            'libelle' => $validatedData['libelle'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Reply updated successfully.');
    }

    public function destroy($id)
    {
        // Retrieve the reply
        $reply = Message::findOrFail($id);

        // Delete the reply
        $reply->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Reply deleted successfully.');
    }

    public function show(Forum $forum, Message $message)
    {
        // Retrieve all replies where ref_message equals the given message's ID
        $repliesF = Reply::where('ref_message', $message->id)->pluck('ref_reply');

        $replies = Message::whereIn('id', $repliesF)->get();

        // Return a view with the retrieved replies
        return view('forum.reply.show', compact('replies', 'message', 'forum'));
    }
}

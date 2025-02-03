<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment(Request $request, Thread $thread)
    {
        $validated = $request->validate([
            'content' => 'required|min:3'
        ]);

        $comment = $thread->comments()->create([
            'content' => $validated['content'],
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id
        ]);

        return back();
    }
}

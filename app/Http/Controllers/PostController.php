<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function createPost(Request $request)
    {
        $incomingData = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $incomingData['title'] = strip_tags($incomingData['title']);
        $incomingData['body'] = strip_tags($incomingData['body']);
        $incomingData['user_id'] = auth()->id();
        $post = Post::create($incomingData);

        // return response($post, 201);

        return redirect('/');
    }

    //
    public function showEditScreen(Post $post)
    {
        if($post->user_id !== auth()->id()) {
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }

    //
    public function updatePost(Request $request, Post $post)
    {
        if($post->user_id !== auth()->id()) {
            return redirect('/');
        }
        
        $incomingData = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $incomingData['title'] = strip_tags($incomingData['title']);
        $incomingData['body'] = strip_tags($incomingData['body']);
        $post->update($incomingData);

        return redirect('/');
    }
}

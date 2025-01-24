<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
}

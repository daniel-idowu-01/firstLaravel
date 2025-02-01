<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    // create thread
    public function createThread(Request $request)
    {
        $incomingData = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|integer',
            'image' => 'nullable|image'
        ]);

        $incomingData['title'] = strip_tags($incomingData['title']);
        $incomingData['body'] = strip_tags($incomingData['body']);
        $incomingData['user_id'] = auth()->id();
        $incomingData['slug'] = \Str::slug($incomingData['title']);

        if($request->hasFile('image')) {
            $incomingData['image'] = $request->file('image')->store('images');
        }

        $thread = Thread::create($incomingData);

        return redirect('/');
    }

    // get thread
    public function showThread(Thread $thread)
    {
        return view('thread', ['thread' => $thread]);
    }

    // update thread
    public function showEditScreen(Thread $thread)
    {
        return view('edit-thread', ['thread' => $thread]);
    }

    // delete thread
    public function deleteThread(Thread $thread)
    {
        $thread->delete();

        return redirect('/');
    }
}

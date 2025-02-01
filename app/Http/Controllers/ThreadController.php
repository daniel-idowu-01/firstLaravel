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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $incomingData['title'] = strip_tags($incomingData['title']);
        $incomingData['body'] = strip_tags($incomingData['body']);
        $incomingData['user_id'] = auth()->id();
        $incomingData['slug'] = \Str::slug($incomingData['title']);

        // existing slug
        $existingSlug = Thread::where('slug', $incomingData['slug'])->first();
        if($existingSlug) {
            $incomingData['slug'] = $incomingData['slug'] . '-' . time();
        }

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $incomingData['image'] = $imagePath;
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

    // upload image
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads', $imageName); // Save to storage/app/public/uploads

            return response()->json(['message' => 'Image uploaded successfully', 'image' => $imageName]);
        }

        return response()->json(['error' => 'No image was uploaded'], 400);
    }
}

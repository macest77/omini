<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $insert = $request->all();
        $insert['user_id'] = auth()->id();
        $insert['comment'] = nl2br(e($request['comment']));
        $post->comments()->create($insert);

        return redirect()->route('posts.show', ['post' => $post])
            ->with('success','Post created successfully.');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->with('success','Comment added successfully.');

    }

    public function destroy(Comment $comment)
    {
        $post = $comment->post()->get()[0];

        if (Auth::user()->id === $post->user()->get()[0]->id || Auth::user()->id === $comment->user()->get()[0]->id) {
            $comment->delete();
            return redirect()->route('posts.show', ['post' => $post])
                ->with('success','Comment was deleted.');

        }
        return redirect()->route('posts.show', ['post' => $post])
            ->with('error', 'Unauthorized.');
    }
}

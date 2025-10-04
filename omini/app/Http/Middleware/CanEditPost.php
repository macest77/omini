<?php

namespace App\Http\Middleware;

use App\Models\Comment;
use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CanEditPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() === null) {
            return redirect()->route('login');
        }

        $post = $request->route()->parameter('post');
        if ( $post instanceof  Post ) {
            if ($post->user()->get()->value('id') === Auth::id()) {
                return $next($request);
            }
        }

        return redirect()->route('posts.index')->withErrors(['access' => __("Can't edit the post")]);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\Comment;
use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCommentOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $comment = Comment::find($request->route('comment')['id']);

        if($request->user()->id !== $comment->user_id) {
            return response()->json([
                'message' => 'У вас нет прав на изменения данного поста.'
            ], 403);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $post = Post::find($request->route('post')['id']);

        if($request->user()->id !== $post->user_id) {
            return response()->json([
                'message' => 'У вас нет прав на изменения данного поста.'
            ], 403);
        }

        return $next($request);
    }
}

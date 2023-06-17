<?php

namespace App\Http\Middleware;

use App\Models\CommentResponse;
use App\Models\Like;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCommentResponseOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = CommentResponse::find($request->route('response')['id']);

        if ($request->user()->id !== $response->user_id) {
            return response()->json([
                'message' => 'У вас нет прав на удаление лайка'
            ], 403);
        }
        return $next($request);
    }
}

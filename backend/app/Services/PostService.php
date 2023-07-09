<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;

class PostService
{
    public function store($fields) {
        $post = Post::create([
            'user_id' => auth()->user()->getAuthIdentifier(),
            'body' => $fields['body'],
            'title' => $fields['title'],
        ]);

        $categories = Category::whereIn('id', $fields['categories'])->get();

        foreach ($categories as $category) {
            $category->posts()->save($post);
        }

        return $post;
    }

    public function update($fields, $post) {
        $categories = Category::whereIn('id', $fields['categories'])->get();

        $post->update([
            'body' => $fields['body'],
            'title' => $fields['title'],
        ]);


        $post->categories()->sync($categories);

        return $post;
    }
}

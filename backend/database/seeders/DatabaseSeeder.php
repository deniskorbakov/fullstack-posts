<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\CommentResponse;
use App\Models\Follower;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        Post::factory(30)->create();
        Category::factory(20)->create();
        DB::table('post_categories')->insert([
            'category_id' => rand(1, 20),
            'post_id' => rand(1, 30),
        ]);
        Like::factory(100)->create();
        Comment::factory(40)->create();
        CommentResponse::factory(20)->create();
        Follower::factory(5)->create();
    }
}

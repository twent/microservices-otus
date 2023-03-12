<?php

namespace Database\Seeders;

use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    public function run(): void
    {
        Comment::factory(5000)->create();
    }
}

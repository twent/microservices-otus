<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'entity_type' => 'App\Models\Book',
            'entity_id' => $this->faker->numberBetween(1, 1000),
            'author' => $this->faker->name,
            'text' => $this->faker->realText(512),
        ];
    }
}

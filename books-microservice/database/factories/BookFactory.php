<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'release_year' => $this->faker->year(),
            'pages_count' => $this->faker->numberBetween(120, 2000),
            'description' => $this->faker->realText(1000),
        ];
    }
}

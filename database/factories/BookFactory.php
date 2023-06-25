<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    // Factory definition
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'genre' => $this->faker->randomElement(['Sci-Fi', 'Fantasy', 'Mystery', 'Romance']),
            'page_count' => $this->faker->numberBetween(1, 1000),
            'status' => $this->faker->randomElement(['Reading', 'Read', 'To Read']),
            'user_id' => 1,
        ];
    }
}

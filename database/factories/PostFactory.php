<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => fake()->sentence(),
            'slug' => fake()->unique()->slug(),
            'exerpt' => collect(fake()->paragraphs(2))->map(fn($item) => "<p>{$item}</p>")->implode(''),
            'body' => collect(fake()->paragraphs(5))->map(fn($item) => "<p>{$item}</p>")->implode('')
        ];
    }
}
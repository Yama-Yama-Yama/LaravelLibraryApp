<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Author;
use App\Models\Publisher;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'status' => $this->faker->boolean(),
            'category_id' => $this->faker->randomElement(Category::pluck('id')),
            'author_id' => $this->faker->randomElement(Author::pluck('id')),
            'publisher_id' => $this->faker->randomElement(Publisher::pluck('id'))
        ];
    }
}

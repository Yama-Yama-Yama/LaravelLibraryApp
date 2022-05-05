<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Customer;





/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookIssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'issue_date' => $this->faker->date(),
            'return_day' => $this->faker->date(),
            'issue_status' => $this->faker->boolean(),
            'customer_id' => $this->faker->randomElement(Customer::pluck('id')),
            'book_id' => $this->faker->randomElement(Book::pluck('id'))
        ];
    }
}

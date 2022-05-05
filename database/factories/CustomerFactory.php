<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = ['male', 'female'];
        
        return [
            'name' => $this->faker->name(),
            'birth_date' => $this->faker->date(),
            'gender' => $gender[random_int(0,1)],
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'user_id' => $this->faker->randomElement(User::pluck('id'))
        ];
    }
}

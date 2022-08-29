<?php

namespace Database\Factories\Domain\Entities;

use Domain\Entities\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{

    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'document_number' => $this->faker->unique()->numerify('###########'),
            'birthday' => now()->subYears(20),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }
}

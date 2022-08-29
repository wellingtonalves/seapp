<?php

namespace Database\Factories\Domain\Entities;

use Domain\Entities\Record;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordFactory extends Factory
{

    protected $model = Record::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'author' => $this->faker->name,
            'release_year' => now()->format('Y'),
            'category' => $this->faker->word(),
            'quantity' => $this->faker->randomDigit(),
        ];
    }
}

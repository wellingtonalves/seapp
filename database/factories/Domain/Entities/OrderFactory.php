<?php

namespace Database\Factories\Domain\Entities;

use Domain\Entities\Client;
use Domain\Entities\Order;
use Domain\Entities\Record;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{

    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => Client::factory()->create()->id,
            'record_id' => Record::factory()->create(['quantity' => 100])->id,
            'quantity' => 10,
        ];
    }
}

<?php

namespace Tests\Feature\Order;

use Domain\Entities\Client;
use Domain\Entities\Order;
use Domain\Entities\Record;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function testCreate()
    {
        $order = Order::factory()->create();
        $request = $this->post(env('APP_URL') . '/api/orders', $order->toArray());
        $this->assertEquals(201, $request->status());
    }

    public function testCreateValidation()
    {
        $data = [];
        $request = $this->post(env('APP_URL') . '/api/orders', $data);
        $this->assertEquals(422, $request->status());
    }

    public function testCreateManyRegister()
    {
        $record = Record::factory([
            'quantity' => 50,
        ])->create();

        for($i = 0; $i < 300; $i++) {
            $client = Client::factory()->create();
            $order = new Order([
                'client_id' => $client->id,
                'record_id' => $record->id,
                'quantity' => 1,
            ]);
            $request = $this->post(env('APP_URL') . '/api/orders', $order->toArray());
            $this->assertEquals(201, $request->status());
        }
    }
}

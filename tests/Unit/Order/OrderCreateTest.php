<?php

namespace Tests\Unit\Order;

use App\Http\Requests\OrderCreateRequest;
use Domain\Entities\Order;
use Domain\Features\Order\OrderCreate;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class OrderCreateTest extends TestCase
{

    public function testeCreate()
    {
        $orderCreateClass = $this->app->make(OrderCreate::class);
        $order = Order::factory()->make()->toArray();
        $request = new OrderCreateRequest($order);
        $response = $orderCreateClass->create($request);
        $this->assertEquals('Pedido em processamento', $response);
    }

    public function testeCreateException()
    {
        $this->expectException(\Exception::class);
        $orderCreateClass = $this->app->make(OrderCreate::class);
        $request = new OrderCreateRequest([]);
        $orderCreateClass->create($request);
    }
}

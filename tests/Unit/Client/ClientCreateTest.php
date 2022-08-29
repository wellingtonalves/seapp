<?php

namespace Tests\Unit\Client;

use App\Http\Requests\ClientCreateRequest;
use Domain\Entities\Client;
use Domain\Features\Client\ClientCreate;
use Tests\TestCase;

class ClientCreateTest extends TestCase
{

    public function testeCreateSuccess()
    {
        $createClientClass = $this->app->make(ClientCreate::class);
        $client = Client::factory()->make()->toArray();
        $dataIn = new ClientCreateRequest($client);
        $response = $createClientClass->create($dataIn);
        $this->assertEquals('Cliente criado com sucesso', $response);
    }

    public function testeCreateException()
    {
        $this->expectException(\Exception::class);
        $createClientClass = $this->app->make(ClientCreate::class);
        $client = Client::factory()->make(['email' => null])->toArray();
        $dataIn = new ClientCreateRequest($client);
        $createClientClass->create($dataIn);
    }
}

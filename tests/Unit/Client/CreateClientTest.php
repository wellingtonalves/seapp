<?php

namespace Tests\Unit\Client;

use App\Http\Requests\CreateClientRequest;
use Domain\Entities\Client;
use Domain\Features\Client\CreateClient;
use Domain\Repositories\IClientRepository;
use Tests\TestCase;

class CreateClientTest extends TestCase
{

    public function testeCreateSuccess()
    {
        $this->mock(IClientRepository::class)
            ->shouldReceive('create')
            ->andReturn(true);

        $createClientClass = $this->app->make(CreateClient::class);
        $cliente = [];
        $dataIn = new CreateClientRequest($cliente);
        $response = $createClientClass->create($dataIn);
        $this->assertTrue($response);
    }

    public function testeCreateException()
    {
        $this->expectException(\Exception::class);
        $createClientClass = $this->app->make(CreateClient::class);
        $cliente = Client::factory()->make(['email' => null])->toArray();
        $dataIn = new CreateClientRequest($cliente);
        $createClientClass->create($dataIn);
    }
}

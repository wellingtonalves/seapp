<?php

namespace Tests\Unit\Client;

use App\Http\Requests\CreateClientRequest;
use Domain\Entities\Client;
use Domain\Features\Client\CreateClient;
use Tests\TestCase;

class CreateClientTest extends TestCase
{

    public function testeCreateSuccess()
    {
        $createClientClass = $this->app->make(CreateClient::class);
        $client = Client::factory()->make()->toArray();
        $dataIn = new CreateClientRequest($client);
        $response = $createClientClass->create($dataIn);
        $this->assertEquals('Cliente criado com sucesso', $response);
    }

    public function testeCreateException()
    {
        $this->expectException(\Exception::class);
        $createClientClass = $this->app->make(CreateClient::class);
        $client = Client::factory()->make(['email' => null])->toArray();
        $dataIn = new CreateClientRequest($client);
        $createClientClass->create($dataIn);
    }
}

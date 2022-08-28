<?php

namespace Tests\Unit\Client;

use App\Http\Requests\UpdateClientRequest;
use Domain\Entities\Client;
use Domain\Features\Client\UpdateClient;
use Tests\TestCase;

class UpdateClientTest extends TestCase
{

    public function testeCreateSuccess()
    {
        $updateClientClass = $this->app->make(UpdateClient::class);
        $client = Client::factory()->create()->toArray();
        $client['name'] = 'teste123';
        $dataIn = new UpdateClientRequest($client);
        $response = $updateClientClass->update($client['id'], $dataIn);
        $this->assertEquals('Cliente atualizado com sucesso', $response);
    }

    public function testeUpdateException()
    {
        $this->expectException(\Exception::class);
        $updateClientClass = $this->app->make(UpdateClient::class);
        $client = Client::factory()->make(['email' => null])->toArray();
        $dataIn = new UpdateClientRequest($client);
        $updateClientClass->update($client['id'], $dataIn);
    }
}

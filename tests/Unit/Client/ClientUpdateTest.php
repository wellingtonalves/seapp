<?php

namespace Tests\Unit\Client;

use App\Http\Requests\ClientUpdateRequest;
use Domain\Entities\Client;
use Domain\Features\Client\ClientUpdate;
use Tests\TestCase;

class ClientUpdateTest extends TestCase
{

    public function testeCreateSuccess()
    {
        $updateClientClass = $this->app->make(ClientUpdate::class);
        $client = Client::factory()->create()->toArray();
        $client['name'] = 'teste123';
        $dataIn = new ClientUpdateRequest($client);
        $response = $updateClientClass->update($client['id'], $dataIn);
        $this->assertEquals('Cliente atualizado com sucesso', $response);
    }

    public function testeUpdateException()
    {
        $this->expectException(\Exception::class);
        $updateClientClass = $this->app->make(ClientUpdate::class);
        $client = Client::factory()->make(['email' => null])->toArray();
        $dataIn = new ClientUpdateRequest($client);
        $updateClientClass->update($client['id'], $dataIn);
    }
}

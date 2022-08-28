<?php

namespace Tests\Feature\Client;

use Domain\Entities\Client;
use Tests\TestCase;

class ClientTest extends TestCase
{
    public function testClientCreateSuccess()
    {
        $data = Client::factory()->make();
        $request = $this->post(env('APP_URL') . '/api/client', $data->toArray());
        $this->assertEquals(201, $request->status());
        $this->assertDatabaseHas('clients', ['email' => $data['email']]);
    }

    public function testClientCreateValidation()
    {
        $data = [
            'email' => 'teste@email.com'
        ];
        $request = $this->post(env('APP_URL') . '/api/client', $data);
        $this->assertEquals(422, $request->status());
        $this->assertDatabaseMissing('clients', ['email' => $data['email']]);
    }
}

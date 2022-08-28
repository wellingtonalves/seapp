<?php

namespace Tests\Unit\Record;

use App\Http\Requests\RecordCreateRequest;
use Domain\Entities\Record;
use Domain\Features\Record\RecordCreate;
use Tests\TestCase;

class RecordCreateTest extends TestCase
{
    public function testCreate()
    {
        $recordCreate = $this->app->make(RecordCreate::class);
        $record = Record::factory()->make()->toArray();
        $request = new RecordCreateRequest($record);
        $response = $recordCreate->create($request);
        $this->assertEquals('Disco criado com sucesso', $response);
    }
}

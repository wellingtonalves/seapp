<?php

namespace Tests\Unit\Record;

use App\Http\Requests\RecordUpdateRequest;
use Domain\Entities\Record;
use Domain\Features\Record\RecordShow;
use Domain\Features\Record\RecordUpdate;
use Tests\TestCase;

class RecordShowTest extends TestCase
{
    public function testShow()
    {
        $record = Record::factory()->create();
        $recordShow = $this->app->make(RecordShow::class);
        $response = $recordShow->show($record->id);
        $this->assertJson($record->toJson(), $response);
    }
}

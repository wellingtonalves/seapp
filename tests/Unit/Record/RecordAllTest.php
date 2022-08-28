<?php

namespace Tests\Unit\Record;

use App\Http\Requests\RecordUpdateRequest;
use Domain\Entities\Record;
use Domain\Features\Record\RecordAll;
use Domain\Features\Record\RecordShow;
use Domain\Features\Record\RecordUpdate;
use Tests\TestCase;

class RecordAllTest extends TestCase
{
    public function testAll()
    {
        Record::factory(10)->create();
        $recordShow = $this->app->make(RecordAll::class);
        $response = $recordShow->all();
        $this->assertIsArray($response->toArray());
        $this->assertGreaterThanOrEqual(10, $response->count());
    }
}

<?php

namespace Tests\Unit\Record;

use App\Http\Requests\RecordUpdateRequest;
use Domain\Entities\Record;
use Domain\Features\Record\RecordDestroy;
use Domain\Features\Record\RecordShow;
use Domain\Features\Record\RecordUpdate;
use Tests\TestCase;

class RecordDeleteTest extends TestCase
{
    public function testDelete()
    {
        $record = Record::factory()->create();
        $createRecord = $this->app->make(RecordDestroy::class);
        $createRecord->destroy($record->id);
        $this->assertSoftDeleted('records', ['id' => $record->id]);
    }
}

<?php

namespace Tests\Unit\Record;

use App\Http\Requests\RecordUpdateRequest;
use Domain\Entities\Record;
use Domain\Features\Record\RecordUpdate;
use Tests\TestCase;

class RecordUpdateTest extends TestCase
{
    public function testUpdate()
    {
        $record = Record::factory()->create();
        $record->name = 'test record';
        $RecordUpdate = $this->app->make(RecordUpdate::class);
        $request = new RecordUpdateRequest($record->toArray());
        $RecordUpdate->update($record->id, $request);
        $this->assertDatabaseHas('records', ['name' => $record->name]);
    }
}

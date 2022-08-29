<?php

namespace Tests\Feature\Record;

use Domain\Entities\Record;
use Tests\TestCase;

class RecordTest extends TestCase
{
    public function testCreate()
    {
        $dataIn = Record::factory()->make()->toArray();
        $request = $this->post(env('APP_URL') . '/api/records', $dataIn);
        $this->assertEquals(201, $request->status());
        $this->assertDatabaseHas('records', ['name' => $dataIn['name']]);
    }

    public function testCreateValidation()
    {
        $dataIn = [
            'name' => 'teste'
        ];
        $request = $this->post(env('APP_URL') . '/api/records', $dataIn);
        $this->assertEquals(422, $request->status());
        $this->assertDatabaseMissing('records', ['name' => $dataIn['name']]);
    }

    public function testUpdate()
    {
        $dataIn = Record::factory()->create()->toArray();
        $dataIn['name'] = 'teste123';
        $request = $this->put(env('APP_URL') . '/api/records/' . $dataIn['id'], $dataIn);
        $this->assertEquals(200, $request->status());
        $this->assertDatabaseHas('records', ['name' => $dataIn['name']]);
    }

    public function testShow()
    {
        $dataIn = Record::factory()->create()->toArray();
        $request = $this->get(env('APP_URL') . '/api/records/' . $dataIn['id']);
        $this->assertEquals(200, $request->status());
        $dataOut = $request['data'];
        ksort($dataIn);
        ksort($dataOut);
        $this->assertSame($dataIn, $dataOut);
    }

    public function testDelete()
    {
        $dataIn = Record::factory()->create()->toArray();
        $request = $this->delete(env('APP_URL') . '/api/records/' . $dataIn['id']);
        $this->assertEquals(200, $request->status());
    }

    public function testAll()
    {
        Record::factory(10)->create()->toArray();
        $request = $this->get(env('APP_URL') . '/api/records');
        $this->assertEquals(200, $request->status());
        $this->assertGreaterThanOrEqual(10, count($request['data']));
    }

    public function testFilterByCategory()
    {
        Record::factory(10)->create(['category' => 'rock'])->toArray();
        Record::factory(10)->create(['category' => 'pop'])->toArray();
        $request = $this->get(env('APP_URL') . '/api/records?category=rock');
        $this->assertEquals(200, $request->status());
        $this->assertCount(10, $request['data']);
    }

    public function testFilterByReleaseYear()
    {
        Record::factory(10)->create(['release_year' => '1981'])->toArray();
        Record::factory(10)->create(['release_year' => '2022'])->toArray();
        $request = $this->get(env('APP_URL') . '/api/records?release_year=1981');
        $this->assertEquals(200, $request->status());
        $this->assertCount(10, $request['data']);
    }

    public function testFilterByName()
    {
        Record::factory(10)->create(['name' => 'Elvis Record'])->toArray();
        Record::factory(10)->create(['name' => 'Rich Record'])->toArray();
        $request = $this->get(env('APP_URL') . '/api/records?name=Elvis Record');
        $this->assertEquals(200, $request->status());
        $this->assertCount(10, $request['data']);
    }

    public function testFilterByAuthor()
    {
        Record::factory(10)->create(['author' => 'Elvis Presley'])->toArray();
        Record::factory(10)->create(['author' => 'Test Rich'])->toArray();
        $request = $this->get(env('APP_URL') . '/api/records?author=Elvis Presley');
        $this->assertEquals(200, $request->status());
        $this->assertCount(10, $request['data']);
    }
}

<?php

namespace App\Repositories\Record;

use Domain\Entities\Record;
use Domain\Repositories\IRecordRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class RecordRepositoryImpl implements IRecordRepository
{

    /**
     * List all Records
     * @return Collection
     */
    public function index(): Collection
    {
        return Record::query()
            ->category()
            ->releaseYear()
            ->name()
            ->author()
            ->get();
    }

    /**
     * Create Record
     * @param $data
     * @return Model
     */
    public function create($data): Model
    {
        return Record::query()->create($data);
    }

    /**
     * Show Record
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model
    {
        return Record::query()->findOrFail($id);
    }

    /**
     * Update Record
     * @param int $id
     * @param $data
     * @return bool
     */
    public function update(int $id, $data): bool
    {
        return Record::query()->findOrFail($id)->update($data);
    }

    /**
     * Destroy Record
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        return Record::query()->findOrFail($id)->delete();
    }
}

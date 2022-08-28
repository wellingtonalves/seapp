<?php

namespace Domain\Features\Record;

use App\Http\Requests\RecordCreateRequest;
use App\Http\Requests\RecordUpdateRequest;
use Domain\Repositories\IRecordRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Ramsey\Collection\Collection;

class RecordShow
{

    private IRecordRepository $repository;

    public function __construct(IRecordRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @return Model
     * @throws Exception
     */
    public function show(int $id): Model
    {
        try {
            return $this->repository->show($id);
        } catch (Exception $exception) {
            Log::error($exception);
            throw new Exception('Erro ao buscar o disco');
        }
    }
}

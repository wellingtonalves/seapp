<?php

namespace Domain\Features\Record;

use Domain\Repositories\IRecordRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class RecordAll
{

    private IRecordRepository $repository;

    public function __construct(IRecordRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws Exception
     * @return Collection
     */
    public function all(): Collection
    {
        try {
            return $this->repository->index();
        } catch (Exception $exception) {
            Log::error($exception);
            throw new Exception('Erro ao buscar o disco');
        }
    }
}

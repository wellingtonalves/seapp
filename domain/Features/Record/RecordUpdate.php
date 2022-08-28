<?php

namespace Domain\Features\Record;

use App\Http\Requests\RecordCreateRequest;
use App\Http\Requests\RecordUpdateRequest;
use Domain\Repositories\IRecordRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class RecordUpdate
{

    private IRecordRepository $repository;

    public function __construct(IRecordRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @param RecordUpdateRequest $request
     * @return string
     * @throws Exception
     */
    public function update(int $id, RecordUpdateRequest $request): string
    {
        try {
            $this->repository->update($id, $request->all());
            return 'Disco atualizado com sucesso';
        } catch (Exception $exception) {
            Log::error($exception);
            throw new Exception('Erro ao atualizar o disco');
        }
    }
}

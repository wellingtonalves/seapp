<?php

namespace Domain\Features\Record;

use App\Http\Requests\RecordCreateRequest;
use Domain\Repositories\IRecordRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class RecordCreate
{

    private IRecordRepository $repository;

    public function __construct(IRecordRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param RecordCreateRequest $request
     * @return string
     * @throws Exception
     */
    public function create(RecordCreateRequest $request): string
    {
        try {
            $this->repository->create($request->all());
            return 'Disco criado com sucesso';
        } catch (Exception $exception) {
            Log::error($exception);
            throw new Exception('Erro ao criar o disco');
        }
    }
}

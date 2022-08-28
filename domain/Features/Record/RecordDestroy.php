<?php

namespace Domain\Features\Record;

use App\Http\Requests\RecordCreateRequest;
use App\Http\Requests\RecordUpdateRequest;
use Domain\Repositories\IRecordRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class RecordDestroy
{

    private IRecordRepository $repository;

    public function __construct(IRecordRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function destroy(int $id): bool
    {
        try {
            $this->repository->destroy($id);
            return 'Disco excluído com sucesso';
        } catch (Exception $exception) {
            Log::error($exception);
            throw new Exception('Erro ao excluír o disco');
        }
    }
}

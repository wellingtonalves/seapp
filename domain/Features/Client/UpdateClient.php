<?php

namespace Domain\Features\Client;

use App\Http\Requests\UpdateClientRequest;
use Exception;
use Domain\Repositories\IClientRepository;
use Illuminate\Support\Facades\Log;

class UpdateClient
{

    /**
     * @var IClientRepository
     */
    private IClientRepository $repository;

    public function __construct(IClientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @param UpdateClientRequest $request
     * @return string
     * @throws Exception
     */
    public function update(int $id, UpdateClientRequest $request): string
    {
        try {
            $this->repository->update($id, $request->all());
            return 'Cliente atualizado com sucesso';
        } catch (Exception $exception) {
            Log::error($exception);
            throw new Exception('Erro ao atualizar o Cliente');
        }
    }
}

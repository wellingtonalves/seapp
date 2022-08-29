<?php

namespace Domain\Features\Client;

use App\Http\Requests\ClientCreateRequest;
use Exception;
use Domain\Repositories\IClientRepository;
use Illuminate\Support\Facades\Log;

class ClientCreate
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
     * @param ClientCreateRequest $request
     * @return string
     * @throws Exception
     */
    public function create(ClientCreateRequest $request): string
    {
        try {
            $this->repository->create($request->all());
            return 'Cliente criado com sucesso';
        } catch (Exception $exception) {
            Log::error($exception);
            throw new Exception('Erro ao criar o Cliente');
        }
    }
}

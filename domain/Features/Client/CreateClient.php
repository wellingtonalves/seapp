<?php

namespace Domain\Features\Client;

use App\Http\Requests\CreateClientRequest;
use Exception;
use Domain\Repositories\IClientRepository;
use Illuminate\Support\Facades\Log;

class CreateClient
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
     * @param CreateClientRequest $request
     * @return bool
     * @throws Exception
     */
    public function create(CreateClientRequest $request): bool
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

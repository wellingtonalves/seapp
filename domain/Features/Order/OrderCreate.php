<?php

namespace Domain\Features\Order;

use App\Events\OrderCreateEvent;
use App\Http\Requests\OrderCreateRequest;
use Domain\Repositories\IOrderRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class OrderCreate
{

    private IOrderRepository $repository;

    public function __construct(IOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param OrderCreateRequest $request
     * @return string
     * @throws Exception
     */
    public function create(OrderCreateRequest $request): string
    {
        try {
            $order = $this->repository->create($request->all());
            OrderCreateEvent::dispatch($order);

            return 'Pedido em processamento';
        } catch (Exception $exception) {
            Log::error($exception);
            throw new Exception('Erro ao criar o Pedido');
        }
    }
}

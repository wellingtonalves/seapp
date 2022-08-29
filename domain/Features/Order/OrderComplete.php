<?php

namespace Domain\Features\Order;

use App\Exceptions\OrderQuantityUnavailableException;
use Domain\Entities\Order;
use Domain\Repositories\IOrderRepository;
use Domain\Repositories\IRecordRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderComplete
{
    private IOrderRepository $repository;
    private IRecordRepository $recordRepository;

    public function __construct(IOrderRepository $repository, IRecordRepository $recordRepository)
    {
        $this->repository = $repository;
        $this->recordRepository = $recordRepository;
    }

    /**
     * @param Order $order
     * @return void
     * @throws OrderQuantityUnavailableException
     */
    public function handle(Order $order)
    {
        $this->hasQuantityAvailable($order);
        $this->repository->changeStatus($order->id, Order::COMPLETE);
        $this->recordRepository->updateQuantity($order->record->id, $order->quantity);
    }

    /**
     * @param Order $order
     * @return void
     * @throws OrderQuantityUnavailableException
     */
    private function hasQuantityAvailable(Order $order): void
    {
        if (!$this->recordRepository->checkQuantityAvailable($order->record->id, $order->quantity)) {
            $this->repository->changeStatus($order->id, Order::CANCELLED);
            throw new OrderQuantityUnavailableException('Quantidade indisponível. Seu pedido foi cancelado.');
        }
    }
}

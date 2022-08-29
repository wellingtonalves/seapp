<?php

namespace App\Repositories\Order;

use App\Exceptions\OrderQuantityUnavailableException;
use Domain\Entities\Order;
use Domain\Repositories\IOrderRepository;
use Illuminate\Database\Eloquent\Model;

class OrderRepositoryImpl implements IOrderRepository
{

    /**
     * Create Order
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return Order::query()->create($data);
    }

    /**
     * Change Order Status
     * @param int $id
     * @param string $status
     * @return bool
     */
    public function changeStatus(int $id, string $status): bool
    {
        return Order::query()->findOrFail($id)->update(['status' => $status]);
    }
}

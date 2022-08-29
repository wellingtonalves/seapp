<?php

namespace Domain\Repositories;

use Illuminate\Database\Eloquent\Model;

interface IOrderRepository
{
    /**
     * Create Order
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * Change Order Status
     * @param int $id
     * @param string $status
     * @return bool
     */
    public function changeStatus(int $id, string $status): bool;
}

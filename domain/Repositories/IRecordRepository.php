<?php

namespace Domain\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IRecordRepository
{

    /**
     * List all Records
     * @return Collection
     */

    public function index(): Collection;

    /**
     * Create Record
     * @param $data
     * @return Model
     */
    public function create($data): Model;

    /**
     * Show Record
     * @param int $id
     * @return Model
     */
    public function show(int $id): Model;

    /**
     * Update Record
     * @param int $id
     * @param $data
     * @return bool
     */
    public function update(int $id, $data): bool;

    /**
     * Destroy Record
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool;

    /**
     * Update Record Quantity
     * @param int $id
     * @param int $quantity
     * @return bool
     */
    public function updateQuantity(int $id, int $quantity): bool;

    /**
     * Check Record Quantity Available
     * @param int $id
     * @param int $orderQuantity
     * @return bool
     */
    public function checkQuantityAvailable(int $id, int $orderQuantity): bool;
}

<?php

namespace Domain\Repositories;

use Illuminate\Database\Eloquent\Model;

interface IClientRepository
{
    /**
     * Create Client
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * Update Client
     * @param $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data): bool;
}

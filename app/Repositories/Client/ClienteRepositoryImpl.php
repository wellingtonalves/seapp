<?php

namespace App\Repositories\Client;

use Domain\Entities\Client;
use Domain\Repositories\IClientRepository;
use Illuminate\Database\Eloquent\Model;

class ClienteRepositoryImpl implements IClientRepository
{

    /**
     * Create Client
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return Client::query()->create($data);
    }

    /**
     * Update Client
     * @param $id
     * @param array $data
     * @return bool
     */
    public function update($id, array $data): bool
    {
        return Client::query()->findOrFail($id)->update($data);
    }
}

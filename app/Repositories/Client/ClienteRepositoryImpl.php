<?php

namespace App\Repositories\Client;

use Domain\Entities\Client;
use Domain\Repositories\IClientRepository;

class ClienteRepositoryImpl implements IClientRepository
{

    public function create($data)
    {
        return Client::query()->create($data);
    }

    public function update($id, $data)
    {
        return true;
    }
}

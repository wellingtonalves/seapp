<?php

namespace Domain\Repositories;

interface IClientRepository
{
    public function create($data);

    public function update($id, $data);
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Domain\Features\Client\CreateClient;
use Domain\Features\Client\UpdateClient;
use Exception;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * @param CreateClientRequest $request
     * @param CreateClient $createClient
     * @return mixed
     */
    public function store(CreateClientRequest $request, CreateClient $createClient)
    {
        try {
            $response = $createClient->create($request);
            return Response::custom($response, null, 201);
        } catch (Exception $exception) {
            return Response::custom($exception->getMessage(), null, 500);
        }
    }

    /**
     * @param int $id
     * @param UpdateClientRequest $request
     * @param UpdateClient $updateClient
     * @return mixed
     */
    public function update(int $id, UpdateClientRequest $request, UpdateClient $updateClient)
    {
        try {
            $response = $updateClient->update($id, $request);
            return Response::custom($response);
        } catch (Exception $exception) {
            return Response::custom($exception->getMessage(), null, 500);
        }
    }
}

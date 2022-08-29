<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\ClientUpdateRequest;
use Domain\Features\Client\ClientCreate;
use Domain\Features\Client\ClientUpdate;
use Exception;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * @param ClientCreateRequest $request
     * @param ClientCreate $createClient
     * @return mixed
     */
    public function store(ClientCreateRequest $request, ClientCreate $createClient)
    {
        try {
            $response = $createClient->create($request);
            return Response::custom($response, null, 201);
        } catch (Exception $exception) {
            return Response::custom($exception->getMessage(), null, 500, 'error');
        }
    }

    /**
     * @param int $id
     * @param ClientUpdateRequest $request
     * @param ClientUpdate $updateClient
     * @return mixed
     */
    public function update(int $id, ClientUpdateRequest $request, ClientUpdate $updateClient)
    {
        try {
            $response = $updateClient->update($id, $request);
            return Response::custom($response);
        } catch (Exception $exception) {
            return Response::custom($exception->getMessage(), null, 500, 'error');
        }
    }
}

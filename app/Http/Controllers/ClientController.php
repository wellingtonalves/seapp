<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use Domain\Features\Client\CreateClient;
use Exception;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    public function create(CreateClientRequest $request, CreateClient $createClient)
    {
        try {
            $createClient->create($request);
            return Response::custom('Cliente criado com sucesso', null, 201);
        } catch (Exception $exception) {
            return Response::custom($exception->getMessage(), null, 500);
        }
    }
}

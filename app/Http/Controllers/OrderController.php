<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use Domain\Features\Order\OrderCreate;
use Exception;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * @param OrderCreateRequest $request
     * @param OrderCreate $orderCreate
     * @return mixed
     */
    public function store(OrderCreateRequest $request, OrderCreate $orderCreate)
    {
        try {
            $response = $orderCreate->create($request);
            return Response::custom($response, null, 201);
        } catch (Exception $exception) {
            return Response::custom($exception->getMessage(), null, 500, 'error');
        }
    }
}

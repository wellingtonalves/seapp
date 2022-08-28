<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;

class CustomResponseProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Response::macro('custom', function ($message = '', $response = null, $statusCode = 200, $status = 'success') {
            $data['message'] = $message;
            $data['data'] = $response;
            $data['status'] = $status;

            return response()->json($data, $statusCode);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

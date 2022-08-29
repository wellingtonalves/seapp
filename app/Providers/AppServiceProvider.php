<?php

namespace App\Providers;

use App\Repositories\Client\ClienteRepositoryImpl;
use App\Repositories\Record\RecordRepositoryImpl;
use Domain\Repositories\IClientRepository;
use Domain\Repositories\IRecordRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IClientRepository::class, ClienteRepositoryImpl::class);
        $this->app->bind(IRecordRepository::class, RecordRepositoryImpl::class);
    }
}

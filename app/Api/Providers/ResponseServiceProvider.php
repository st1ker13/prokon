<?php

namespace App\Api\Providers;

use App\Api\Manager\ResponseManager;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('api.response', function ($app) {
            return new ResponseManager();
        });
    }
}

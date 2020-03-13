<?php

namespace App\Api\Providers;

use App\Api\Manager\BookManager;
use Illuminate\Support\ServiceProvider;

class ManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('api.book.manager', function ($app) {
            return new BookManager();
        });
    }
}

<?php

namespace App\Providers\Author;

use App\Manager\AuthorManager;
use Illuminate\Support\ServiceProvider;

class IndexManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('author.manager', function ($app) {
            return new AuthorManager();
        });
    }
}

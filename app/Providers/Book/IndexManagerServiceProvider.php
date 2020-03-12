<?php

namespace App\Providers\Book;

use App\Manager\BookManager;
use Illuminate\Support\ServiceProvider;

class IndexManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('book.manager', function ($app) {
            return new BookManager();
        });
    }
}

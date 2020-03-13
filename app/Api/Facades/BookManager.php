<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class BookManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api.book.manager';
    }
}

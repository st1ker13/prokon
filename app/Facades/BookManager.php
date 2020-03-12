<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class BookManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'book.manager';
    }
}

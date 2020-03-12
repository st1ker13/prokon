<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class AuthorManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'author.manager';
    }
}

<?php

namespace App\Api\Facades;

use Illuminate\Support\Facades\Facade;

class Response extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api.response';
    }
}

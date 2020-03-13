<?php

namespace App\Api\Manager;

use App\Api\Exceptions\RequestArgumentsException;

/**
 * Class ResultManager
 * @package App\Api\Manager
 */
class ResultManager
{
    /**
     * @param $data
     * @throws RequestArgumentsException
     */
    public static function checkRequestArguments($data)
    {
        if ($data->isEmpty()) {
            throw RequestArgumentsException::notFoundError();
        }
    }

    /**
     * @param $data
     * @throws RequestArgumentsException
     */
    public static function checkFoundObject($data)
    {
        if ($data == NULL) {
            throw RequestArgumentsException::notFoundError();
        }
    }
}

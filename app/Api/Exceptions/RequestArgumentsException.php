<?php

namespace App\Api\Exceptions;

use App\Api\Consts\Exceptions;

/**
 * Class RequestArgumentsException
 * @package App\Api\Exceptions
 */
class RequestArgumentsException extends IndexException
{
    /**
     * @param array|null $error
     * @return static
     */
    public static function notFoundError(array $error = null)
    {
        return new static (Exceptions::RESULT_ERROR, 'Не найдено результатов модели', $error);
    }
}

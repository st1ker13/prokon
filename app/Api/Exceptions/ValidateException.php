<?php

namespace App\Api\Exceptions;

use App\Api\Consts\Exceptions;

/**
 * Class ValidateException
 * @package App\Api\Exceptions
 */
class ValidateException extends IndexException
{
    /**
     * @param object $exception
     * @return static
     */
    public static function error(object $exception) {
        return new static (Exceptions::VALIDATE_ERROR, 'Ошибка валидации.', $exception->errors());
    }
}

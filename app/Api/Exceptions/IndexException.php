<?php

namespace App\Api\Exceptions;

use App\Api\Consts\Exceptions;
use App\Api\Facades\Response;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class IndexException
 * @package App\Api\Exceptions
 */
class IndexException extends Exception
{
    /**
     * IndexException constructor.
     * @param int|null $code
     * @param string|null $message
     * @param object|null $error
     */
    public function __construct(int $code = null, string $message = null, object $error = null)
    {
        $this->code = $code;
        $this->message = $message;
        $this->error = $error;
    }

    /**
     *
     * @param  $exception
     * @return JsonResponse
     */
    public static function render($exception)
    {
        if ($exception instanceof IndexException) {
            $errorArray['error'] = $exception->error;
            $errorArray['code'] = $exception->code;
            $errorArray['message'] = $exception->message;
        } else {
            $errorArray['error'] = null;
            $errorArray['code'] = Exceptions::DEFAULT_ERROR;
            $errorArray['message'] = $exception->getMessage();
        }

        return Response::errorResponse($errorArray);
    }
}

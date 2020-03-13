<?php

namespace App\Api\Manager;

/**
 * Class ResponseManager
 * @package App\Api\Manager
 */
class ResponseManager
{
    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function callResponse($data)
    {
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    /**
     * @param array $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse(array $exception)
    {
        return response()->json([
            'status' => false,
            'message' => $exception['message'],
            'code' => $exception['code'],
            'error' => $exception['error'],
        ]);
    }
}

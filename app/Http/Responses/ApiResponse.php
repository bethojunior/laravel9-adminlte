<?php

namespace App\Http\Responses;

use App\Contracts\Exception\CustomException;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;


class ApiResponse
{
    /**
     * @param $data
     * @param string $message
     * @return JsonResponse
     */
    public static function created($data = null, $message = 'Criado com sucesso')
    {
        return response()->json([
            'status'    => true,
            'response'  => $data,
            'message'   => $message
        ], 201);
    }

    /**
     * @param Exception|null $data
     * @param string $message
     * @param int $status
     * @param bool $paramError
     * @return JsonResponse
     */
    public static function error($data = null, $message = 'Error', int $status = 400, $paramError = false)
    {
        if ($data instanceof Exception)
            return response()->json([
                'status'        => false,
                'response'      => self::mountErrorResponse($data),
                'message'       => $data instanceof CustomException ? $data->getMessage() : $message,
                'paramError'    => $data instanceof CustomException
            ],
                $data instanceof CustomException ? $status : 500);

        return response()->json([
            'status'        => false,
            'response'      => $data,
            'message'       => $message,
            'paramError'    => $paramError
        ], $status);
    }

    /**
     * @param $data
     * @param string $message
     * @return JsonResponse
     */
    public static function success($data = null, $message = 'Sucesso')
    {
        return response()->json([
            'status'    => true,
            'response'  => $data,
            'message'   => $message
        ]);
    }

    /**
     * @param Exception $exception
     * @return array
     */
    private static function mountErrorResponse(Exception $exception)
    {
        $response = [$exception->getMessage()];

        if (env('APP_ENV') != 'production')
            array_push($response, $exception->getFile(), $exception->getLine());

        return $response;
    }

}

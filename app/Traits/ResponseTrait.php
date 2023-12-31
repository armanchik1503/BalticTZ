<?php

declare(strict_types=1);

namespace App\Services\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ResponseTrait.
 */
trait ResponseTrait
{
    /**
     * @param string $message
     * @param mixed  $data
     * @param int    $code
     *
     * @return JsonResponse
     */
    public function response(string $message, mixed $data = '', int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(
            [
                'message' => $message,
                'data'    => $data,
            ], $code
        );
    }

    /**
     * @param string $message
     * @param int    $code
     *
     * @return JsonResponse
     */
    public function errorResponse(string $message, int $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json(
            [
                'message' => $message,
            ],
            $code
        );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    /**
     * Return a "Bad Request" response with status code 400.
     * @param string $message
     * @return JsonResponse
     */
    public function error(string $message): JsonResponse
    {
        return response()->json(['message' => $message], 400);
    }

    /**
     * Return a json-data payload with status 200.
     * @param mixed $content
     * @return JsonResponse
     */
    public function json($content): JsonResponse
    {
        return response()->json($content);
    }

    /**
     * Return a json response with status 200.
     * @param string $message
     * @return JsonResponse
     */
    public function success(string $message): JsonResponse
    {
        return $this->json(['message' => $message]);
    }

}

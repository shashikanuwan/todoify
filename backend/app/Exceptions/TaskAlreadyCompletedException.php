<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskAlreadyCompletedException extends Exception
{
    public function render(Request $request): JsonResponse
    {
        return response()->json(
            ['message' => 'The task has already been completed'],
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}

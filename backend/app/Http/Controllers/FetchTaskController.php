<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Repositories\TaskRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FetchTaskController extends Controller
{
    public function __invoke(Request $request, TaskRepository $repository): JsonResponse
    {
        return response()
            ->json(TaskResource::collection(
                $repository->getPendingTasks($request->user())
            ));
    }
}

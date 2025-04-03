<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Queries\TaskQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FetchTaskController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return response()
            ->json(TaskResource::collection(
                TaskQuery::fiveRecentTasks($request->user())
            ));
    }
}

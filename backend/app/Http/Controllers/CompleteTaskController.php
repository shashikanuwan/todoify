<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompleteTaskRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Todoify\Task\Actions\CompleteTask;

class CompleteTaskController extends Controller
{
    public function __construct(protected CompleteTask $completeTask) {}

    public function __invoke(CompleteTaskRequest $request, Task $task): JsonResponse
    {
        $this->completeTask->execute(
            $task,
            now()
        );

        return response()->json(
            ['message' => 'Task completed successfully'],
            Response::HTTP_OK
        );
    }
}

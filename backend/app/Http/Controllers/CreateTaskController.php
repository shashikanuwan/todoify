<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Todoify\Task\Actions\CreateTask;

class CreateTaskController extends Controller
{
    public function __construct(protected CreateTask $createTask) {}

    public function __invoke(CreateTaskRequest $request): JsonResponse
    {
        $this->createTask->execute(
            $request->validated('title'),
            $request->validated('description'),
            Carbon::make($request->validated('due_date')),
            $request->user()
        );

        return response()->json(
            ['status' => 'Task created successfully'],
            Response::HTTP_CREATED
        );
    }
}

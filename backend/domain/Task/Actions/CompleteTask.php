<?php

namespace Todoify\Task\Actions;

use App\Models\Task;
use Carbon\Carbon;

class CompleteTask
{
    public function execute(
        Task $task,
        Carbon $completedAt,
    ): void {
        $task = Task::query()->find($task->id);
        $task->completed_at = $completedAt;

        $task->save();
    }
}

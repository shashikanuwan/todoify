<?php

namespace Todoify\Task\Actions;

use App\Exceptions\TaskAlreadyCompletedException;
use App\Models\Task;
use Carbon\Carbon;

class CompleteTask
{
    /**
     * @throws TaskAlreadyCompletedException
     */
    public function execute(
        Task $task,
        Carbon $completedAt,
    ): void {
        $this->ensureTaskIsNotAlreadyCompleted($task);

        $task = Task::query()->find($task->id);
        $task->completed_at = $completedAt;

        $task->save();
    }

    /**
     * @throws TaskAlreadyCompletedException
     */
    private function ensureTaskIsNotAlreadyCompleted(Task $task): void
    {
        if ($task->isCompleted()) {
            throw new TaskAlreadyCompletedException;
        }
    }
}

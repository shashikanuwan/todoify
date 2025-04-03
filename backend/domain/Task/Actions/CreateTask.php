<?php

namespace Todoify\Task\Actions;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;

class CreateTask
{
    public function execute(
        string $title,
        string $description,
        Carbon $dueDate,
        User $user
    ): Task {
        $task = new Task;
        $task->title = $title;
        $task->description = $description;
        $task->due_date = $dueDate;
        $task->user()->associate($user);

        return $task;
    }
}

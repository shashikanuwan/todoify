<?php

namespace App\Queries;

use App\Models\Task;
use App\Models\User;

class TaskQuery
{
    public static function fiveRecentTasks(User $user)
    {
        return Task::query()
            ->forUser($user->id)
            ->latestPending()
            ->get();
    }
}

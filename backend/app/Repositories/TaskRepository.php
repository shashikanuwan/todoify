<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    public function getPendingTasks(User $user, int $count = 5): Collection
    {
        return Task::query()
            ->whereUser($user)
            ->incomplete()
            ->orderBy('due_date')
            ->limit($count)
            ->get();
    }
}

<?php

use App\Models\Task;
use Carbon\Carbon;
use Todoify\Task\Actions\CompleteTask;

it('can complete task', function () {
    $task = Task::factory()->create([
        'completed_at' => null,
    ]);

    $date = Carbon::now()->addDay();

    resolve(CompleteTask::class)
        ->execute(
            $task,
            $date
        );

    $task->refresh();

    expect($task->completed_at)->toBeInstanceOf(Carbon::class)
        ->and($task->completed_at->toDateString())->toEqual($date->toDateString());
});

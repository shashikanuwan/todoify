<?php

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Todoify\Task\Actions\CreateTask;

it('can create task', function () {
    $user = User::factory()->create();
    $dueDate = Carbon::now()->addDay();

    /** @var Task $task */
    $task = resolve(CreateTask::class)
        ->execute(
            'Test Task',
            'Test Description',
            $dueDate,
            $user
        );

    expect($task)->toBeInstanceOf(Task::class)
        ->and($task->title)->toBe('Test Task')
        ->and($task->description)->toBe('Test Description')
        ->and($task->due_date)->toBe($dueDate->format('d M y, h:i A'))
        ->and($task->user_id)->toBe($user->id)
        ->and($task->completed_at)->toBeNull();
});

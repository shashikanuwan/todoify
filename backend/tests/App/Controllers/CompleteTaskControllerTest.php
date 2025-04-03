<?php

use App\Models\Task;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Todoify\Task\Actions\CompleteTask;

it('allows the task owner to mark their task as complete', function () {
    /** @var User $user */
    $user = User::factory()->create();

    /** @var Task $task */
    $task = Task::factory()->create(['user_id' => $user->id]);

    mock(completeTask::class)
        ->shouldReceive('execute');

    $response = $this->actingAs($user)
        ->patchJson(route('tasks.complete', $task));

    $response->assertStatus(Response::HTTP_OK)
        ->assertJson(['message' => 'Task completed successfully']);
});

it('prevents non-owners from marking a task as complete', function () {
    /** @var User $user */
    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    /** @var Task $task */
    $task = Task::factory()->create(['user_id' => $otherUser->id]);

    $response = $this->actingAs($user)
        ->patchJson(route('tasks.complete', $task));

    $response->assertStatus(Response::HTTP_FORBIDDEN);
});

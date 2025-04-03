<?php

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

it('requires title field', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->postJson(route('tasks.store'), [
            'description' => 'This is a task description',
            'due_date' => now()->addDay()->format('Y-m-d H:i'),
        ]);

    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    $response->assertJsonValidationErrors(['title']);
});

it('requires description field', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->postJson(route('tasks.store'), [
            'title' => 'This is a task title',
            'due_date' => now()->addDay()->format('Y-m-d H:i'),
        ]);

    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    $response->assertJsonValidationErrors(['description']);
});

it('requires due date field', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->postJson(route('tasks.store'), [
            'title' => 'This is a task title',
            'description' => 'This is a task description',
        ]);

    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    $response->assertJsonValidationErrors(['due_date']);
});

it('requires title to be a string and not exceed 255 characters', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->postJson(route('tasks.store'), [
            'title' => str_repeat('A', 256),
            'description' => 'This is a task description',
            'due_date' => now()->addDay()->format('Y-m-d H:i'),
        ]);

    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    $response->assertJsonValidationErrors(['title']);
});

it('requires description to be a string and not exceed 1000 characters', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->postJson(route('tasks.store'), [
            'title' => 'Task Title',
            'description' => str_repeat('A', 1001),
            'due_date' => now()->addDay()->format('Y-m-d H:i'),
        ]);

    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    $response->assertJsonValidationErrors(['description']);
});

it('requires due_date to be a valid date in the future', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->postJson(route('tasks.store'), [
            'title' => 'Task Title',
            'description' => 'This is a task description',
            'due_date' => now()->subDay()->format('Y-m-d H:i'),
        ]);

    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    $response->assertJsonValidationErrors(['due_date']);
});

it('can create a new task', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->postJson(route('tasks.store'), [
            'title' => 'Task Title',
            'description' => 'This is a task description',
            'due_date' => now()->addDay()->format('Y-m-d H:i'),
        ]);

    $response->assertStatus(Response::HTTP_CREATED);
    $response->assertJson(['message' => 'Task created successfully']);
});

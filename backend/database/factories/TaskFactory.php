<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        $dueDate = $this->faker->dateTimeBetween('-1 day', '+2 days');

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'due_date' => $dueDate,
            'completed_at' => $dueDate >= now() ? null : now(),
            'user_id' => User::factory(),
        ];
    }
}

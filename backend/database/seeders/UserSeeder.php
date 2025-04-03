<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        collect(range(1, 3))
            ->each(function (int $id) {
                User::factory()
                    ->has(Task::factory(10))
                    ->create([
                        'name' => 'User '.$id,
                        'email' => 'user_'.$id.'@todoify.com',
                    ]);
            });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        // Crie tarefas fictícias para cada usuário
        $users->each(function ($user) {
            Task::factory()->count(3)->create(['user_id' => $user->id]);
        });
    }
}

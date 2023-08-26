<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run (): void
    {


        $this->call([
            TaskSeeder::class,
            UserSeeder::class,
        ]);

        $users = \App\Models\User::factory(10)->create();
        $users->each(fn($user) => Task::factory()->count(3)->create(['user_id' => $user->id]));

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

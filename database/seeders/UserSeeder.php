<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@email.fr',
            'role_id' => 1,
            'password' => bcrypt('testtest')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'ProjectManager',
            'email' => 'proman@email.fr',
            'role_id' => 3,
            'job' => 'Project Manager',
            'password' => bcrypt('testtest')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Developer',
            'email' => 'dev@email.fr',
            'role_id' => 2,
            'job' => 'Developer',
            'password' => bcrypt('testtest')
        ]);
    }
}

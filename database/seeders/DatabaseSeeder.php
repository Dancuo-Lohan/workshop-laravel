<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Role::factory()->create([
            'name' => 'admin'
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'developer'
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'project-manager'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@email.fr',
            'role_id' => 1,
            'password' => bcrypt('testtest')
        ]);
    }
}

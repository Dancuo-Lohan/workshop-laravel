<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskTagSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\TaskTag::factory()->create([
            'label' => 'front'
        ]);

        \App\Models\TaskTag::factory()->create([
            'label' => 'back'
        ]);
    }
}

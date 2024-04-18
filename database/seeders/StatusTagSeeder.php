<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTagSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\StatusTag::factory()->create([
            'label' => 'TODO'
        ]);

        \App\Models\StatusTag::factory()->create([
            'label' => 'En cours'
        ]);

        \App\Models\StatusTag::factory()->create([
            'label' => 'Bloqué'
        ]);

        \App\Models\StatusTag::factory()->create([
            'label' => 'A livrer en préproduction'
        ]);

        \App\Models\StatusTag::factory()->create([
            'label' => 'A recetter'
        ]);

        \App\Models\StatusTag::factory()->create([
            'label' => 'A voir avec le client'
        ]);
    }
}

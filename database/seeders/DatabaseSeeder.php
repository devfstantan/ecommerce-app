<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // seeder l'administrateur

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        Product::factory(90)->create();
        Product::factory(10)->create([
            'is_published' => false
        ]);
    }
}

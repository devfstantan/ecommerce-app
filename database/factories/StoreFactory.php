<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $manager = User::factory()->create([
            'role' => "store-manager"
        ]);
        
        return [
            'name' => fake()->unique()->company(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'manager_id' => $manager["id"]
        ];
    }
}

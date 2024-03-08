<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    public static $imagesSamples = [
        '/images/samples/joystick.webp',
        '/images/samples/pc-game.webp',
        '/images/samples/pc.webp',
        '/images/samples/vr.webp',
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $scores_count = fake()->numberBetween(0, 100);
        $scores_total = fake()->numberBetween(0,$scores_count) * 5;
        $rating = ($scores_count > 0)? $scores_total/$scores_count : 0;
        
        return [
            'title' => fake()->sentence(3),
            'sku' => fake()->unique()->regexify('[A-Z0-9]{5}'),
            'is_published' => true,
            'scores_total' => $scores_total,
            'scores_count' => $scores_count,
            'rating' => $rating,
            'price' => fake()->randomFloat(2,10, 5000),
            'image' => fake()->randomElement(self::$imagesSamples),
            'description' => fake()->paragraph(),
        ];
    }
}

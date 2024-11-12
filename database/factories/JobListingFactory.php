<?php

namespace Database\Factories;


use App\Models\Joblisting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\job_listings>
 */
class JobListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle,
            'description' => fake()->paragraph,
            'salary' => fake()->numberBetween(5_000, 150_000),
            'location' => fake()->city,
            'category' => fake()->randomElement(Joblisting::$category),
            'experience' => fake()->randomElement(Joblisting::$experience)
        ];
    }
}

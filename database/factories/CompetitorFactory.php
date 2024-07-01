<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CompetitorClass;
use App\Models\Team;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competitor>
 */
class CompetitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name'=> fake()->lastName(),
            'team_id'=> Team::query()->inRandomOrder()->first()->team_id,
            'class_id'=> CompetitorClass::query()->inRandomOrder()->first()->class_id,
        ];
    }
}

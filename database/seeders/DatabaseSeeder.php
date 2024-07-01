<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Competitor;
use App\Models\CompetitorClass;
use App\Models\Team;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Team::factory()->create([
            'team_name'=> 'Team 1',
        ]);
        Team::factory()->create([
            'team_name'=> 'Team 2',
        ]);

        CompetitorClass::factory()->create([
            'class_name'=> 'Master',
        ]);
        CompetitorClass::factory()->create([
            'class_name'=> 'Common',
        ]);
        Competitor::factory(10)->create();
    }
}

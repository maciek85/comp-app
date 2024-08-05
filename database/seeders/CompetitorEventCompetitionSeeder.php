<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Competitor;
use App\Models\Team;
use App\Models\CompetitorClass;
use App\Models\Competition;
use App\Models\Event;
use App\Models\CompetitionEventCompetitorTeam;

class CompetitorEventCompetitionSeeder extends Seeder
{

    static function generateTenIntegers(){
        $numbers = [];
    for ($i = 0; $i < 10; $i++) {
        $numbers[] = rand(0, 10);
    }
    return $numbers;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = []; // Initialize the data array

        $competitors = Competitor::all();
        $competitions = Competition::all();
        $events = Event::all();
        
        
            for ($i = 0; $i < count($competitors); $i++) {
                $competitor_id = $competitors[$i]->competitor_id;
                $event_id = $events->first()->event_id;
                for($j = 0; $j < count($competitions); $j++) {
                $list_of_points = CompetitorEventCompetitionSeeder::generateTenIntegers();
                // $points = rand(0, 100);
                // $random_number_array = range(0, 100);
                // shuffle($random_number_array );
                // $random_number_array = array_slice($random_number_array ,0,10);
                $points = array_sum($list_of_points);
                $list_of_points_pg = "{".implode(",", $list_of_points)."}";
                $data[] = [
                    'created_at' => now(),
                    'updated_at' => now(),
                    'competition_id' => $competitions[$j]->competition_id,
                    'event_id' => $event_id,
                    'competitor_id' => $competitor_id,
                    'points' => $points,
                    'list_of_points' => $list_of_points_pg,
                ];
                }
        }
       

        // Insert data into the table
        foreach ($data as $item) {
            DB::table('event_competitor_competition')->insert($item);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Competitor;
use App\Models\Event;
use App\Models\Team;
class CompetitorEventTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   
        $competitors = Competitor::all();
        $events = Event::all();
        $teams = Team::all();
        $data = [];
        for ($i = 0; $i < count($competitors); $i++) {
            $data[] = [
                'competitor_id' => $competitors[$i]->competitor_id,
                'event_id' => $events->first()->event_id,
                'team_id' => ($i % 2 == 0) ? $teams->first()->team_id : $teams->last()->team_id
            ];
        }
        DB::table('event_competitor_team')->insert($data);
    }
}

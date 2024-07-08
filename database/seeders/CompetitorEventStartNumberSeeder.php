<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Competitor;
use App\Models\Event;
use App\Models\CompetitorClass;

class CompetitorEventStartNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competitors = Competitor::all();
        $events = Event::all();
        $data = [];
        $start_number = 1;
        foreach ($competitors as $competitor) {
                $data[] = [
                    'competitor_id' => $competitor->competitor_id,
                    'event_id' => $events->first()->event_id,
                    'competitor_start_number' => $start_number,
                ];
                $start_number++;
        }
        DB::table('event_competitor_start_number')->insert($data);
    }
}

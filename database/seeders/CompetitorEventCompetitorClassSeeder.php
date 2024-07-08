<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Competitor;
use App\Models\CompetitorClass;
use App\Models\Event;

class CompetitorEventCompetitorClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $competitors = Competitor::all();
        $competitorClasses = CompetitorClass::all();
        $events = Event::all();
        $data = [];
        for ($i = 0; $i < count($competitors); $i++) {
            $data[] = [
                'competitor_id' => $competitors[$i]->competitor_id,
                'event_id' => $events->first()->event_id,
                'class_id' => ($i % 2 == 0) ? $competitorClasses->first()->class_id : $competitorClasses->last()->class_id
            ];
        }
        DB::table('event_competitor_class')->insert($data);
    }
}

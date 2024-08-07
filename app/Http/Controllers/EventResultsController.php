<?php

namespace App\Http\Controllers;

use App\Models\Competitor;
use App\Models\EventResults;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Models\CompetitorClass;
use App\Models\CompetitionEventCompetitor;

class EventResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitors = Competitor::first();

        
        $teams = Team::all();
        $competitor_classes = CompetitorClass::all();
        $results = DB::select('SELECT * from get_event_results()');
        $event_results = collect($results)->map(function ($x) {
            $model = new CompetitionEventCompetitor();
            return $model->newFromBuilder($x);
        });
          
        return view('results.index', ["event_results" => $event_results, "teams" => $teams, "competitor_classes" => $competitor_classes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EventResults $competitorId)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventResults $eventResults)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventResults $eventResults)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventResults $eventResults)
    {
        //
    }
}

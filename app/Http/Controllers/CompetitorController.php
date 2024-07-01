<?php

namespace App\Http\Controllers;

use App\Models\Competitor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CompetitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitors = Competitor::all();
        $competitors_data = DB::table("competitors")
            ->join("teams", "competitors.team_id", "=", "teams.team_id")
            ->join("competitor_classes", "competitors.class_id", "=", "competitor_classes.class_id")
            ->select("competitors.*", "teams.team_name", "competitor_classes.class_name")
            ->get();
        return view('competitors.index', ["competitors" => $competitors_data]);
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
    public function show(Competitor $competitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competitor $competitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competitor $competitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competitor $competitor)
    {
        //
    }
}

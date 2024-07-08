<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Competitor extends Model
{
    use HasFactory, Notifiable, HasUuids;



    protected $fillable = [
        'first_name',
        'last_name',
     
    ];

    protected $primaryKey = 'competitor_id';

    // public function competitionResults(): BelongsToMany
    // {
    //     return $this->belongsToMany(CompetitionEventCompetitorTeam::class,);
    // }
}

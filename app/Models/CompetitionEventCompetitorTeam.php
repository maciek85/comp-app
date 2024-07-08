<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class CompetitionEventCompetitor extends Model
{
    use HasFactory, Notifiable, HasUuids;


    protected $fillable = [
        'competition_id',
        'event_id',
        'competitor_id',
        'points',
        'list_of_points',
    ];

    // protected $primaryKey = 'competition_event_competitor_team_id';


    // Accessor to automatically convert list_of_points from database format to a PHP array
    public function getListOfPointsAttribute($value)
    {
        return $value ? explode(',', trim($value, "{}")) : [];
    }

    // Mutator to automatically convert list_of_points from a PHP array to database format
    public function setListOfPointsAttribute($value)
    {
        $this->attributes['list_of_points'] = "{" . implode( ",", $value) . "}";
    }

    
}

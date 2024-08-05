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
        'competitor_position',
        'competitor_start_number',
        'first_name',
        'last_name',
        'class_name',
        'team_name',
        'comp_1',
        'comp_2',
        'comp_3',
        'total_points',
        'concatenated_list_of_points',

    ];

    // protected $primaryKey = 'competition_event_competitor_team_id';


    // Accessor to automatically convert list_of_points from database format to a PHP array
    public function getConcatenatedListOfPointsAttribute($value)
    {
        $result = json_decode($value, true);
    
    // Check if json_decode was successful
    if (json_last_error() === JSON_ERROR_NONE) {
        return $result;
    } else {
        // Handle the error or return an empty array if the string cannot be decoded
        return [];
    }
    }

    // Mutator to automatically convert list_of_points from a PHP array to database format
    public function setListOfPointsAttribute($value)
    {
        $this->attributes['list_of_points'] = "{" . implode( ",", $value) . "}";
    }

    
}

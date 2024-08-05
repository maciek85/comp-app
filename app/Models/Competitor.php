<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Competitor extends Model
{
    use HasFactory, Notifiable, HasUuids;



    protected $fillable = [
        'first_name',
        'last_name',
     
    ];

    protected $primaryKey = 'competitor_id';

    public function competitions(): BelongsToMany
    {
        return $this->belongsToMany(Competition::class, 'event_competitor_competition', 'competitor_id', 'competition_id');
    } 
}

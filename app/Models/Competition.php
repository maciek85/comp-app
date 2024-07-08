<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Competition extends Model
{
    use HasFactory, Notifiable, HasUuids;


    protected $fillable = [
        'competition_name',
        'competition_max_points',
        'competition_description',
    ];
    protected $primaryKey = 'competition_id';

    
}

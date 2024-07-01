<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Team extends Model
{
    use HasFactory, Notifiable, HasUuids;


    protected $fillable = [
        'team_name',
        
    ];
    protected $primaryKey = 'team_id';
}

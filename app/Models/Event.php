<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Event extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'event_name',
        'event_date',
        'event_description',
        'event_rules',
    ];
    protected $primaryKey = 'event_id';
}

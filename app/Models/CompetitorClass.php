<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class CompetitorClass extends Model
{
    use HasFactory, Notifiable, HasUuids;


    protected $fillable = [
        'class_name',
    ];

    protected $primaryKey = 'class_id';
}

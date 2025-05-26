<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RathaYatraEvent extends Model
{
    use HasFactory;

    protected $table = 'ratha__yatra_event';

    protected $fillable = [
        'event_name',
        'date',
        'photo',
        'description',
        'language',
    ];
}

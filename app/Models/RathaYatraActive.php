<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RathaYatraActive extends Model
{
    use HasFactory;

    protected $table = 'ratha__yatra_active';

    protected $fillable = [
        'live_video',
        'section',
    ];
}
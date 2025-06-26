<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RathaYatraVideo extends Model
{
    use HasFactory;

    protected $table = 'ratha__yatra_video';

    protected $fillable = [
        'title',
        'description',
        'localVideo',
        'thumbnail',
    ];
}

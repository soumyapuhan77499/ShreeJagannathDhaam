<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apk extends Model
{
    use HasFactory;
    protected $table = 'apk_upload';

    protected $fillable = [
        'version',
        'apk_file'
        
   ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempleNews extends Model
{
    protected $table = 'temple__news';

    protected $fillable = [
        'type','temple_id', 'notice_name','notice_name_english','niti_notice','niti_notice_english', 'start_date', 'end_date', 'notice_descp','notice_insert_user_id','notice_update_user_id','niti_notice_insert_user_id','status','niti_notice_status'
    ];

}

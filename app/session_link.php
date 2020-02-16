<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class session_link extends Model
{
    protected $fillable = [
        'stu_id', 'tutor_id', 'link'
    ];
}

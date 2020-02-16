<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    protected $fillable = ["day", "time","tutor_id","stu_id"];

    // public function tutor()
    // {
    //     return $this->belongsTo(tutor::class); testing
    // }
}

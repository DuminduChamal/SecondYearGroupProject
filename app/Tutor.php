<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Qualification', 'user_id','referName','referStatus','referEmail','referNumber','subject_id','rate'
    ];

    
}

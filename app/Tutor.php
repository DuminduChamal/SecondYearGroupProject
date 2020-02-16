<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Qualification', 'user_id','referName','referStatus','referEmail','referNumber','subject_id','rate'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function subject()
    {
        return $this->belongsTo(subject::class);
    }

    public function timeslot()
    {
        // return $this->belongsTo('App\Timeslot','id','tutor_id');
        return $this->hasMany('App\Timeslot','tutor_id');

    }

}

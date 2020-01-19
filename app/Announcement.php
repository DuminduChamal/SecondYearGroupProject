<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
     //Table name
     protected $table = 'announcements';
     //Primary key
     public $primaryKey = 'id';
     //Timestaps
     public $timestamps = true;
 
     protected $fillable = ["title","announcement", "id","admin_id"];
      
     public function creator(){
          return $this->belongsTo('App\User','admin_id','id');
     }

     // public function annouce(){
     //      return $this->hasOne('App\User','admin_id','id');
     // }
}

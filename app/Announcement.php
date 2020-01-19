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
 
}

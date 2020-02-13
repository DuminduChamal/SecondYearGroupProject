<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    public function tutor()
    {
        return $this->hasMany(tutor::class);
    }
}

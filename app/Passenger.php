<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function trips()
    {
        return $this->belongsToMany(Trip::class);
    }
}

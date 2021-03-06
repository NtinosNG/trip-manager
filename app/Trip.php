<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{

    public function passengers()
    {
        return $this->belongsToMany(Passenger::class);
    }
}

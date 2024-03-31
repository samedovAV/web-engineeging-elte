<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public function tracks()
    {
        return $this->belongsToMany(Track::class)->withTimestamps();
    }
}

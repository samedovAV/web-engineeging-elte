<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'bg_url', 'user_id'];
    // protected $guarded = []; // attributes that aren't mass assignable

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
